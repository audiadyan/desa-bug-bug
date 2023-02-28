<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.about', [
            'page_title' => 'Tentang Desa',
            'about' => About::first(),
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'body' => ['required'],
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        About::firstOrCreate()->update($validatedData);
        return back()->with('success', 'Data berhasil diupdate!');
    }
}
