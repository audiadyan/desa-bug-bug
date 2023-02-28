@extends('layouts.layout-admin')

@section('admin_content')
    <form action="{{ $action }}" method="post" enctype="multipart/form-data"
        class="bg-white p-6 max-w-5xl rounded-lg shadow-md">
        @if ($edit)
            @method('put')
        @endif
        @csrf

        <div class="form-control mb-5">
            <span class="font-medium text-md mb-1">Judul Berita</span>
            <input type="text" placeholder="Judul Berita" class="input input-bordered max-w-xl" id="title" name="title"
                value="{{ old('title', $news->title ?? '') }}" required />
            @error('title')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control mb-5">

            <span class="font-medium text-md mb-1">Gambar Cover</span>
            @if ($edit)
                <div class="bg-cover bg-no-repeat bg-center rounded-lg mb-3 max-w-xl shadow-md" id="image_prev_news"
                    style="
                    background-image: url('{{ asset('storage/' . $news->image) }}');
                    height: 350px;
                    ">
                </div>
            @endif
            @error('image')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror

            <input onchange="previewImageStyle('image_prev_news', 'image_news')" type="file"
                class="file-input file-input-bordered w-full max-w-xs" id="image_news" name="image" />
        </div>

        <div class="form-control mb-5">
            <span class="font-medium text-md mb-1">Konten</span>
            @error('body')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $news->body ?? '') }}">
            <trix-editor input="body" class="bg-white"></trix-editor>
        </div>

        <button class="btn w-full">Simpan / Posting</button>
    </form>
@endsection

@section('script_head')
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection

@section('script')
    <script type="text/javascript" src="/js/previewImage.js"></script>
@endsection
