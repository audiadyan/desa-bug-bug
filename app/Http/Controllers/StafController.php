<?php

namespace App\Http\Controllers;

use App\Models\Staf;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class StafController extends Controller
{
    public function index()
    {
        return view('admin.staf', [
            'page_title' => 'Staf',
            'stafs' => Staf::with(['editor'])->filter(request('search'))->orderBy('name', 'ASC')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.staf-create', [
            'page_title' => 'Tambah Staf',
        ]);
    }

    public function store(Request $request)
    {
        // dd(strtotime($request->dob));

        $rule = [
            'name' => ['required', 'max:50'],
            'nip' => ['nullable', 'digits:18', 'integer'],
            'position' => ['required', 'max:100'],
            'address' => ['nullable', 'max:255'],
            'dob' => ['nullable', 'date'],
            'education' => ['nullable', 'max:255'],
            'photo' => ['nullable', 'file', 'image', 'max:3072'],
            'whatsapp' => ['nullable', 'min:11', 'regex:/^(628[1-9]*)$/'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'email' => ['nullable', 'email:dns'],
        ];

        $validatedData = $request->validate($rule);

        $validatedDataSocial = array(
            'whatsapp' => $validatedData['whatsapp'],
            'facebook' => $validatedData['facebook'],
            'twitter' => $validatedData['twitter'],
            'instagram' => $validatedData['instagram'],
            'youtube' => $validatedData['youtube'],
            'email' => $validatedData['email'],
        );

        $validatedDataStaf = array(
            'nip' => $validatedData['nip'],
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'address' => $validatedData['address'],
            'dob' => $validatedData['dob'],
            'education' => $validatedData['education'],
        );

        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images-staf');
            $validatedDataStaf['photo'] = $validatedData['photo'];
        }

        $validatedData['username'] = SlugService::createSlug(Staf::class, 'username', $request->name);

        Staf::create($validatedDataStaf)->social()->associate(Social::create($validatedDataSocial))->save();
        return redirect('/auth/staf')->with('success', 'Data Berhasil Diupdate!');
    }

    public function edit(Staf $staf)
    {
        return view('admin.staf-edit', [
            'page_title' => 'Edit Staf',
            'staf' => $staf,
        ]);
    }

    public function update(Request $request, Staf $staf)
    {
        $rule = [
            'name' => ['required', 'max:50'],
            'nip' => ['nullable', 'digits:18', 'integer'],
            'position' => ['required', 'max:100'],
            'address' => ['nullable', 'max:255'],
            'dob' => ['nullable', 'date'],
            'education' => ['nullable', 'max:255'],
            'photo' => ['nullable', 'file', 'image', 'max:3072'],
            'whatsapp' => ['nullable', 'min:11', 'regex:/^(628[1-9]*)$/'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'email' => ['nullable', 'email:dns'],
        ];

        $validatedData = $request->validate($rule);

        $validatedDataSocial = array(
            'whatsapp' => $validatedData['whatsapp'],
            'facebook' => $validatedData['facebook'],
            'twitter' => $validatedData['twitter'],
            'instagram' => $validatedData['instagram'],
            'youtube' => $validatedData['youtube'],
            'email' => $validatedData['email'],
        );

        $validatedDataStaf = array(
            'nip' => $validatedData['nip'],
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'address' => $validatedData['address'],
            'dob' => $validatedData['dob'],
            'education' => $validatedData['education'],
            'editor_id' => auth()->user()->id,
        );

        if ($request->file('photo')) {
            if ($staf->photo) {
                Storage::delete($staf->photo);
            }

            $validatedData['photo'] = $request->file('photo')->store('images-staf');
            $validatedDataStaf['photo'] = $validatedData['photo'];
        }

        $username = SlugService::createSlug(Staf::class, 'username', $request->name, ['unique' => false]);
        if ($username != $staf->username) {
            $validatedData['username'] = SlugService::createSlug(Staf::class, 'username', $request->name);
        }

        Staf::where('id', $staf->id)->update($validatedDataStaf);
        Social::where('id', $staf->social_id)->update($validatedDataSocial);
        return redirect('/auth/staf')->with('success', 'Data Berhasil Diupdate!');
    }

    public function destroy(Staf $staf)
    {
        if ($staf->photo) {
            Storage::delete($staf->photo);
        }

        Staf::destroy($staf->id);
        return redirect('/auth/staf')->with('success', 'Staf Berhasil Dihapus!');
    }
}
