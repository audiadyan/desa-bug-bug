@extends('layouts.layout-admin')

@section('admin_content')
    @if (session()->has('success'))
        @include('components.alert-success')
    @endif

    <section class="bg-white rounded-xl p-4 border shadow-md max-w-4xl">
        <div class="flex justify-between mb-3">
            <h2 class="font-semibold">Terakhir diedit oleh : {{ $about->user->name ?? '-' }}</h2>
            <h2 class="font-semibold">
                {{ isset($about->updated_at) ? date('l, j F Y | H:i', strtotime($about->updated_at)) : '' }}</h2>
        </div>

        <form action="/auth/about/update" method="post">
            @method('put')
            @csrf

            <div class="form-control mb-5">
                @error('body')
                    <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $about->body ?? '') }}">
                <trix-editor input="body" class="bg-white"></trix-editor>
            </div>

            <button class="btn w-full">Simpan</button>
        </form>
    </section>
@endsection

@section('script_head')
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection
