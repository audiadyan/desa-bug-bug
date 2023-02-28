<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'whatsapp' => ['nullable', 'min:11', 'regex:/^(628[1-9]*)$/'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'email' => ['nullable', 'email:dns'],
        ]);

        Social::where('id', $request->social_id)->update($validatedData);
        return back()->with('success', 'Data Berhasil Diupdate!');
    }
}
