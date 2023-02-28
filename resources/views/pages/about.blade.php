@extends('layouts.layout-public')

@section('main_content')
    <h2 class="text-2xl font-medium mb-4 flex flex-inline border-b-4 border-gray-300">Tentang Desa
    </h2>

    <div class="bg-white border rounded-lg shadow-lg p-6">
        {!! $about->body ?? 'Data belum tersedia' !!}
    </div>
@endsection
