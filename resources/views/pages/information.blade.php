@extends('layouts.layout-public')

@section('main_content')
    <div class="flex flex-col lg:flex-row lg:space-x-8">
        <section class="w-full lg:w-2/3 flex flex-wrap sm:block mb-5 lg:mb-0">
            @if (sizeOf($newss) != 0)
                @foreach ($newss as $news)
                    <div class="mb-3">
                        @include('components.item-news', [
                            'news' => $news,
                        ])
                    </div>
                @endforeach
            @else
                <div class="bg-white p-4 text-center font-medium rounded-xl shadow-md w-full">
                    Data belum tersedia
                </div>
            @endif
        </section>

        <section class="w-full lg:w-1/3">
            <h2 class="text-2xl font-medium mb-4 border-b-4 border-gray-300">Agenda Kegiatan</h2>

            <ul class="list-none">
                @include('components.list-event', [
                    'action' => '/auth/staf',
                ])
            </ul>
        </section>
    </div>

    <div class="mt-5 d-flex justify-content-start">
        {{ $newss->links() }}
    </div>
@endsection
