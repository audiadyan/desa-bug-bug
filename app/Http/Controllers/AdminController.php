<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin', [
            'page_title' => 'Daftar Admin',
            'admins' => User::where('id', '!=', auth()->user()->id)->filter(request('search'))->orderBy('name')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.admin-create', [
            'page_title' => 'Tambah Admin'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:50'],
            'username' => ['required', 'unique:users', 'min:8', 'max:50'],
            'password' => ['required', 'min:8'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/auth/admin')->with('success', 'Admin Berhasil Ditambahkan!');
    }

    public function edit(User $admin)
    {
        return view('admin.admin-edit', [
            'page_title' => 'Edit Admin',
            'admin' => $admin
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'password' => ['required', 'min:8'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('username', $request['username'])->update($validatedData);

        return redirect('/auth/admin')->with('success', 'Admin Berhasil Diupdate!');
    }

    public function destroy(User $admin)
    {
        if ($admin->photo) {
            Storage::delete($admin->photo);
        }

        User::destroy($admin->id);
        return redirect('/auth/admin')->with('success', 'Admin Berhasil Dihapus!');
    }

    public function changeAdmin(User $admin)
    {
        User::where('username', $admin->username)->update(['role_id' => 1]);
        User::where('username', auth()->user()->username)->update(['role_id' => 2]);
        return redirect('/auth/dashboard')->with('success', 'Super Admin Berhasil Diganti!');
    }
}
