<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event', [
            'page_title' => 'Agenda Kegiatan',
            'events' => Event::with(['user', 'editor'])->filter(request('search'))->orderBy('time')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.event-create', [
            'page_title' => 'Tambah Agenda',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'time' => ['required', 'date', 'after:' . date('Y-m-d H:i:s', time())],
            'location' => ['required', 'max:255'],
            'body' => ['max:400'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = SlugService::createSlug(Event::class, 'slug', $request->name);

        Event::create($validatedData);
        return redirect('/auth/event')->with('success', 'Agenda berhasil Ditambahkan!');
    }

    public function edit(Event $event)
    {
        return view('admin.event-edit', [
            'page_title' => 'Edit Agenda',
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $rules = [
            'name' => ['required', 'max:255'],
            'location' => ['required', 'max:255'],
            'body' => ['max:400'],
        ];

        if ($request->time) {
            $rules['time'] = ['date', 'after:' . date('Y-m-d H:i:s', time())];
        }

        $validatedData = $request->validate($rules);

        $slug = $validatedData['slug'] = SlugService::createSlug(Event::class, 'slug', $request->name, ['unique' => false]);
        if ($slug != $event->slug) {
            $validatedData['slug'] = SlugService::createSlug(Event::class, 'slug', $request->name);
        }

        $validatedData['editor_id'] = auth()->user()->id;

        Event::where('id', $event->id)->update($validatedData);
        return redirect('/auth/event')->with('success', 'Agenda berhasil Diupdate!');
    }

    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
