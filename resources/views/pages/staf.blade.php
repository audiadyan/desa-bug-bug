@extends('layouts.layout-public')

@section('main_content')
    <div class="flex flex-col flex-wrap items-center md:flex-row md:justify-center">
        @if (sizeOf($stafs) != 0)
            @foreach ($stafs as $staf)
                <a href="/government/staf/{{ $staf->username }}" target="_blank"
                    class="card w-80 bg-base-100 shadow-xl mb-5 mx-3 md:w-64 transition ease-in-out delay-150 hover:scale-105 hover:cursor-pointer">
                    <div class="bg-cover bg-center rounded-t-lg overflow-hidden bg-no-repeat"
                        style="
                    background-image: url('{{ $staf->photo ? asset('storage/' . $staf->photo) : asset('storage/images-profil/default-profile.png') }}');
                    min-height: 250px;
                    max-height: 250px;
                    ">
                    </div>
                    <div class="flex flex-col justify-center px-3 mt-2 mb-4 ">
                        <div class="card-title text-md mx-auto max-w-full truncate">{{ $staf->position }}</div>
                        <hr class="h-px my-1 bg-dark-200 border border-10">
                        <div class="card-title text-sm mx-auto max-w-full truncate">{{ $staf->name }}</div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="bg-white p-4 text-center font-medium rounded-xl shadow-md w-full">
                Data belum tersedia
            </div>
        @endif
    </div>
@endsection
