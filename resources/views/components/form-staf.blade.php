@extends('layouts.layout-admin')

@section('admin_content')
    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        <section class="mx-auto bg-white rounded-lg shadow-md border p-4 flex flex-col space-y-3 items-center max-w-2xl">
            @if ($edit)
                @method('put')
            @endif
            @csrf

            <div
                class="relative overflow-hidden w-44 h-44 rounded-full ring ring-gray-400 ring-offset-base-100 ring-offset-2">
                <img id="image-prev" name="image-prev"
                    src="{{ isset($staf->photo) ? asset('storage/' . $staf->photo) : asset('storage/images-profil/default-profile.png') }}" />

                <input type="file" onchange="previewImage()" id="image" name="photo"
                    class="absolute bg-gray-200 bottom-0 left-0 pl-7 w-full file-input file-input-ghost" />
                @error('image')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Nama</span>
                <input type="text" id="name" name="name" placeholder="Nama" class="input input-bordered"
                    value="{{ old('name', $staf->name ?? '') }}" required />
                @error('name')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Jabatan</span>
                <input type="text" id="position" name="position" placeholder="Jabatan" class="input input-bordered"
                    value="{{ old('position', $staf->position ?? '') }}" required />
                @error('position')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">NIP</span>
                <input type="text" id="nip" name="nip" placeholder="NIP" class="input input-bordered"
                    value="{{ old('nip', $staf->nip ?? '') }}" />
                @error('nip')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Alamat</span>
                <input value="{{ old('address', $staf->address ?? '') }}" type="text" id="address" name="address"
                    placeholder="Alamat" class="input input-bordered" />
                @error('address')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full flex flex-col">
                <div class="flex justify-between">
                    <label class="font-medium text-md mb-1">Tanggal Lahir</label>
                    <div>{{ $edit ? (isset($staf->dob) ? date('l, j F Y', strtotime($staf->dob)) : '') : '' }}</div>
                </div>
                <input type="datetime-local" placeholder="{{ $edit ? 'Ganti Tanggal Lahir' : 'Pilih Tanggal' }}"
                    class="input input-bordered hover:cursor-pointer" id="dob" name="dob" />
                @error('dob')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-control w-full">
                <span class="font-medium text-md mb-1">Pendidikan</span>
                <input value="{{ old('education', $staf->education ?? '') }}" type="text" id="education"
                    name="education" placeholder="Informatika Unram" class="input input-bordered" />
                @error('education')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
            </div>

            @if ($edit)
                <input type="hidden" name="social_id" value="{{ $staf->social_id ?? '' }}">
            @endif

            <div class="w-full grid md:grid-cols-2 mb-5 gap-3">
                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text">Whatsapp</span>
                    <input type="text" placeholder="6287xxxxxxxxx" id="whatsapp" name="whatsapp"
                        value="{{ old('whatsapp', $staf->social->whatsapp ?? '') }}"
                        class="input input-bordered input-sm w-full max-w-xs" />
                    @error('whatsapp')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text">Facebook</span>
                    <input type="text" placeholder="https://facebook.com/xxxxx" id="facebook" name="facebook"
                        value="{{ old('facebook', $staf->social->facebook ?? '') }}"
                        class="input input-bordered input-sm w-full max-w-xs" />
                    @error('facebook')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text">Twitter</span>
                    <input type="text" placeholder="https://twitter.com/xxxxx" id="twitter" name="twitter"
                        value="{{ old('twitter', $staf->social->twitter ?? '') }}"
                        class="input input-bordered input-sm w-full max-w-xs" />
                    @error('twitter')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text">Instagram</span>
                    <input type="text" placeholder="https://www.instagram.com/xxxxx" id="instagram" name="instagram"
                        value="{{ old('instagram', $staf->social->instagram ?? '') }}"
                        class="input input-bordered input-sm w-full max-w-xs" />
                    @error('instagram')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text">Youtube</span>
                    <input type="text" placeholder="https://www.youtube.com/xxxxx" id="youtube" name="youtube"
                        value="{{ old('youtube', $staf->social->youtube ?? '') }}"
                        class="input input-bordered input-sm w-full max-w-xs" />
                    @error('youtube')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text">Email</span>
                    <input type="text" placeholder="xxxxx@email.com" id="email" name="email"
                        value="{{ old('email', $dashboard->social->email ?? '') }}"
                        class="input input-bordered input-sm w-full max-w-xs" />
                    @error('email')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button class="btn w-full">Simpan</button>
        </section>
    </form>
@endsection

@section('script_head')
    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('script')
    <script type="text/javascript" src="/js/previewImage.js"></script>

    {{-- flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("input[type=datetime-local]", {
            maxDate: "today",
            altInput: true,
            altFormat: "l, j F Y",
        });
    </script>
@endsection
