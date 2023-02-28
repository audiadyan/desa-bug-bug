@extends('layouts.layout-admin')

@section('admin_content')
    @if (session()->has('success'))
        @include('components.alert-success')
    @endif

    <div class="max-w-4xl">
        <section class="bg-white rounded-lg p-4 border shadow-md mb-5">
            <h2 class="text-xl font-medium mb-4 flex flex-inline border-b-4 border-gray-300">Logo Desa
            </h2>

            <form action="/auth/dashboard/update" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="bg-cover bg-no-repeat bg-center rounded-lg mb-3 mx-auto" id="image_prev_logo"
                    style="
                    background-image: url('{{ isset($dashboard->logo) ? asset('storage/' . $dashboard->logo) : asset('storage/images-background/default-logo.png') }}');
                    height: 150px;
                    width: 150px;
                    ">
                </div>

                <input type="hidden" name="oldImage" value="{{ $dashboard->logo ?? '' }}">
                <input onchange="previewImageStyle('image_prev_logo', 'image_logo')" id="image_logo" name="logo"
                    type="file" class="file-input file-input-bordered w-full" required />
                @error('logo')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror

                <button class="btn w-full w-full mt-3">Simpan</button>
            </form>
        </section>

        <section class="bg-white rounded-lg p-4 border shadow-md mb-5">
            <h2 class="text-xl font-medium mb-4 flex flex-inline border-b-4 border-gray-300">Background Bar Navigasi
            </h2>

            <form action="/auth/dashboard/update" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="bg-cover bg-no-repeat bg-center rounded-lg mb-3" id="image_prev_navbar"
                    style="
                    background-image: url('{{ isset($dashboard->bg_navbar) ? asset('storage/' . $dashboard->bg_navbar) : asset('storage/images-background/default-navbar.jpg') }}');
                    height: 350px;
                    ">
                </div>

                <input type="hidden" name="oldImage" value="{{ $dashboard->bg_navbar ?? '' }}">
                <input onchange="previewImageStyle('image_prev_navbar', 'image_navbar')" id="image_navbar" name="bg_navbar"
                    type="file" class="file-input file-input-bordered w-full" required />
                @error('bg_navbar')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror

                <button class="btn w-full w-full mt-3">Simpan</button>
            </form>
        </section>

        <section class="bg-white rounded-lg p-4 border shadow-md mb-5">
            <h2 class="text-xl font-medium mb-4 flex flex-inline border-b-4 border-gray-300">Background Halaman Login
            </h2>
            <form action="/auth/dashboard/update" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="bg-cover bg-no-repeat bg-center rounded-lg mb-3" id="image_prev_login"
                    style="
                    background-image: url('{{ isset($dashboard->bg_login) ? asset('storage/' . $dashboard->bg_login) : asset('storage/images-background/default-login.jpg') }}');
                    height: 350px;
                    ">
                </div>

                <input type="hidden" name="oldImage" value="{{ $dashboard->bg_login ?? '' }}">
                <input onchange="previewImageStyle('image_prev_login', 'image_login')" id="image_login" name="bg_login"
                    type="file" class="file-input file-input-bordered w-full" required />
                @error('bg_login')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror

                <button class="btn w-full mt-3">Simpan</button>
            </form>
        </section>

        <section class="bg-white rounded-lg p-4 border shadow-md mb-5">
            <h2 class="text-xl font-medium mb-4 flex flex-inline border-b-4 border-gray-300">Background Detail Staf
            </h2>
            <form action="/auth/dashboard/update" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="bg-cover bg-no-repeat bg-center rounded-lg mb-3" id="image_prev_staf"
                    style="
                    background-image: url('{{ isset($dashboard->bg_staf) ? asset('storage/' . $dashboard->bg_staf) : asset('storage/images-background/default-staf.jpeg') }}');
                    height: 350px;
                    ">
                </div>

                <input type="hidden" name="oldImage" value="{{ $dashboard->bg_staf ?? '' }}">
                <input onchange="previewImageStyle('image_prev_staf', 'image_staf')" id="image_staf" name="bg_staf"
                    type="file" class="file-input file-input-bordered w-full" required />
                @error('bg_staf')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror

                <button class="btn w-full mt-3">Simpan</button>
            </form>
        </section>

        <section class="bg-white rounded-lg p-4 border shadow-md mb-5">
            <h2 class="text-xl font-medium mb-4 border-b-4 border-gray-300">Sosial Media
            </h2>

            <form action="/auth/social" method="post">
                @method('put')
                @csrf

                <input type="hidden" name="social_id" value="{{ $dashboard->social_id ?? '' }}">

                <div class="grid md:grid-cols-2 mb-5 gap-2">
                    <div class="form-control w-full max-w-xs">
                        <span class="font-medium label-text">Whatsapp</span>
                        <input type="text" placeholder="6287xxxxxxxxx" id="whatsapp" name="whatsapp"
                            value="{{ old('whatsapp', $dashboard->social->whatsapp ?? '') }}"
                            class="input input-bordered input-sm w-full max-w-xs" />
                        @error('whatsapp')
                            <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-xs">
                        <span class="font-medium label-text">Facebook</span>
                        <input type="text" placeholder="https://facebook.com/xxxxx" id="facebook" name="facebook"
                            value="{{ old('facebook', $dashboard->social->facebook ?? '') }}"
                            class="input input-bordered input-sm w-full max-w-xs" />
                        @error('facebook')
                            <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-xs">
                        <span class="font-medium label-text">Twitter</span>
                        <input type="text" placeholder="https://twitter.com/xxxxx" id="twitter" name="twitter"
                            value="{{ old('twitter', $dashboard->social->twitter ?? '') }}"
                            class="input input-bordered input-sm w-full max-w-xs" />
                        @error('twitter')
                            <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-xs">
                        <span class="font-medium label-text">Instagram</span>
                        <input type="text" placeholder="https://www.instagram.com/xxxxx" id="instagram"
                            name="instagram" value="{{ old('instagram', $dashboard->social->instagram ?? '') }}"
                            class="input input-bordered input-sm w-full max-w-xs" />
                        @error('instagram')
                            <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-xs">
                        <span class="font-medium label-text">Youtube</span>
                        <input type="text" placeholder="https://www.youtube.com/xxxxx" id="youtube" name="youtube"
                            value="{{ old('youtube', $dashboard->social->youtube ?? '') }}"
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
            </form>
        </section>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/js/previewImage.js"></script>
@endsection
