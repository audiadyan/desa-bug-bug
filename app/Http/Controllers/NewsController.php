<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news', [
            'page_title' => 'Berita',
            'newss' => News::with(['user', 'editor'])->filter(request('search'))->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.news-create', [
            'page_title' => 'Tambah Berita',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'image' => ['required', 'file', 'image', 'max:3072'],
            'body' => ['required'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = SlugService::createSlug(News::class, 'slug', $request->title);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 120);
        $validatedData['image'] = $request->file('image')->store('images-posts');


        News::create($validatedData);
        return redirect('/auth/news')->with('success', 'Berita berhasil Ditambahkan!');
    }

    public function edit(News $news)
    {
        return view('admin.news-edit', [
            'page_title' => 'Edit Berita',
            'news' => $news,
        ]);
    }

    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'image' => ['file', 'image', 'max:3072'],
            'body' => ['required'],
        ]);

        $slug = SlugService::createSlug(News::class, 'slug', $request->title, ['unique' => false]);
        if ($slug != $news->slug) {
            $validatedData['slug'] = SlugService::createSlug(News::class, 'slug', $request->title);
        }

        $validatedData['editor_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 120);

        if ($request->file('image')) {
            if ($news->image) {
                Storage::delete($news->image);
            }
            $validatedData['image'] = $request->file('image')->store('images-posts');
        }

        News::where('id', $news->id)->update($validatedData);
        return redirect('/auth/news')->with('success', 'Berita berhasil Diupdate!');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::delete($news->image);
        }

        News::destroy($news->id);
        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
