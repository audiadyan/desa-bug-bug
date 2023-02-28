<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('admin.userProfile', [
            'page_title' => 'Profil',
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rule = [
            'name' => ['required', 'max:50'],
            'photo' => ['image', 'file', 'max:3072'],
        ];

        if ($request->username != $user->username) {
            $rule['username'] = ['required', 'unique:users', 'min:8', 'max:50'];
        }

        if ($request->password != '') {
            $rule['password'] = ['min:8'];
        }

        if ($request->phone != $user->phone) {
            $rule['phone'] = ['unique:users', 'min:11', 'regex:/^(628[1-9]*)$/'];
        }

        $validatedData = $request->validate($rule);

        if ($request->file('photo')) {
            if ($user->photo) {
                Storage::delete($user->photo);
            }
            $validatedData['photo'] = $request->file('photo')->store('images-profil');
        }

        if ($request->password != '') {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        User::where('username', $user->username)->update($validatedData);

        return redirect('/auth/user')->with('success', 'Profil Berhasil Diupdate!');
    }
}
