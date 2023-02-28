@extends('layouts.layout-admin')

@section('admin_content')
    @if (session()->has('success'))
        @include('components.alert-success')
    @endif

    <section class="bg-white rounded-xl p-4 border shadow-md mb-4 max-w-4xl">
        <div class="flex justify-between items-end mb-4 border-b-4 border-gray-300">
            <h2 class="text-xl font-medium">Populasi Penduduk
            </h2>
            <h2 class="font-medium text-sm">Terakhir diedit oleh : {{ $statistic->user->name ?? '-' }} |
                {{ isset($statistic->updated_at) ? date('l, j F Y | H:i', strtotime($statistic->updated_at)) : '' }}</h2>
        </div>




        <form action="/auth/statistic/update" method="post">
            @method('put')
            @csrf

            <div class="grid md:grid-cols-2 mb-5 gap-3">
                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text mb-1">Laki-Laki</span>
                    <input id="male" name="male" type="text" placeholder="Contoh: 1000"
                        class="input input-bordered input-sm w-full max-w-xs"
                        value="{{ old('male', $statistic->male ?? '') }}" />
                    @error('male')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control w-full max-w-xs">
                    <span class="font-medium label-text mb-1">Perempuan</span>
                    <input id="female" name="female" type="text" placeholder="Contoh: 1100"
                        class="input input-bordered input-sm w-full max-w-xs"
                        value="{{ old('female', $statistic->female ?? '') }}" />
                    @error('female')
                        <div class="font-medium text-xs text-red-400">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn mx-auto w-full">Simpan</button>
        </form>
    </section>
@endsection
