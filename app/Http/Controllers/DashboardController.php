<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'page_title' => 'Dashboard',
            'dashboard' => Dashboard::with(['social'])->first(),
        ]);
    }

    public function update(Request $request)
    {
        $rule = [];

        if ($request->logo) {
            $rule['bg_navbar'] = ['image', 'file', 'max:2048'];
        } else if ($request->bg_navbar) {
            $rule['bg_navbar'] = ['image', 'file', 'max:5120'];
        } else if ($request->bg_staf) {
            $rule['bg_staf'] = ['image', 'file', 'max:5120'];
        } else if ($request->bg_login) {
            $rule['bg_login'] = ['image', 'file', 'max:5120'];
        }

        $validatedData = $request->validate($rule);

        if ($request->file('logo') || $request->file('bg_navbar') || $request->file('bg_staf') || $request->file('bg_login')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            if ($request->logo) {
                $validatedData['logo'] = $request->file('logo')->store('images-background');
            } else if ($request->bg_navbar) {
                $validatedData['bg_navbar'] = $request->file('bg_navbar')->store('images-background');
            } else if ($request->bg_staf) {
                $validatedData['bg_staf'] = $request->file('bg_staf')->store('images-background');
            } else if ($request->bg_login) {
                $validatedData['bg_login'] = $request->file('bg_login')->store('images-background');
            }
        }

        Dashboard::first()->update($validatedData);
        return back()->with('success', 'Data Berhasil Diupdate!');
    }
}
