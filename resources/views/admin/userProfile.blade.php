@extends('layouts.layout-admin')

@section('admin_content')
    @if (session()->has('success'))
        @include('components.alert-success')
    @endif

    <form action="/auth/user/{{ $user->username }}" method="post" enctype="multipart/form-data">
        <section class="mx-auto bg-white rounded-lg shadow-md border p-4 flex flex-col space-y-3 items-center max-w-2xl">
            @method('put')
            @csrf

            <div
                class="relative overflow-hidden w-44 h-44 rounded-full ring ring-gray-400 ring-offset-base-100 ring-offset-2">
                <img id="image-prev" name="image-prev"
                    src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('storage/images-profil/default-profile.png') }}" />

                <input type="file" onchange="previewImage()" id="image" name="photo"
                    class="absolute bg-gray-200 bottom-0 left-0 pl-7 w-full file-input file-input-ghost" />
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Nama</span>
                <input type="text" id="name" name="name" placeholder="Nama" class="input input-bordered"
                    value="{{ old('name', $user->name) }}" required />
                @error('name')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Username</span>
                <input type="text" id="username" name="username" placeholder="Username" class="input input-bordered"
                    value="{{ old('username', $user->username) }}" required />
                @error('username')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Password</span>
                <input type="password" id="password" name="password" placeholder="Ganti Password"
                    class="input input-bordered" />
                @error('password')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Nomor Telepon</span>
                <input type="text" id="phone" name="phone" placeholder="6287xxxxxxxxx" class="input input-bordered"
                    value="{{ old('phone', $user->phone) }}" />
                @error('phone')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <button class="w-full btn mx-auto">Simpan</button>
        </section>
    </form>
@endsection

@section('script')
    <script type="text/javascript" src="/js/previewImage.js"></script>
@endsection
