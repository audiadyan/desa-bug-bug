@extends('layouts.layout-public')

@section('main_content')
    <div class="flex flex-wrap -mx-2">
        <section class="w-full lg:w-2/3 px-2 mb-5">
            <div class="min-h-full">
                <h2 class="text-3xl font-medium mb-4 flex flex-inline border-b-4 border-gray-300">Berita Terbaru <a
                        href="/information"
                        class="ml-3 pb-1 text-gray-400 hover:text-blue-600 rounded-lg self-end text-xs">Tampilkan
                        Semua</a>
                </h2>

                @if (sizeOf($newss) != 0)
                    <div
                        class="flex flex-col items-center md:flex-row md:flex-wrap md:justify-around lg:justify-start lg:mr-5">
                        @foreach ($newss as $news)
                            <div class="mb-3">
                                @include('components.item-news', [
                                    'news' => $news,
                                ])
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white p-4 text-center font-medium rounded-xl shadow-md">
                        Data belum tersedia
                    </div>
                @endif
            </div>
        </section>

        <div class="w-full lg:w-1/3 px-2 mb-5 flex flex-col sm:flex-row lg:flex-col sm:space-x-4 lg:space-x-0">
            <section class="w-full sm:w-1/2 lg:w-full mb-5 lg-mb-0">
                <h2 class="text-lg lg:text-3xl font-medium mb-4 border-b-4 border-gray-300"><a href="/government/staf">Staf
                        Desa</a></h2>

                @if (sizeOf($stafs) != 0)
                    <div id="carouselExampleControls"
                        class="bg-white shadow-md border rounded-xl h-[300px] max-h-[300px] p-[10px] carousel slide relative"
                        data-bs-ride="carousel">
                        <div class="carousel-inner relative w-full overflow-hidden">
                            @foreach ($stafs as $staf)
                                <div
                                    class="carousel-item @if ($loop->first) active @endif relative float-left w-full">
                                    <div class="bg-cover bg-center rounded-xl overflow-hidden bg-no-repeat"
                                        style="
                                            background-image: url('{{ $staf->photo ? asset('storage/' . $staf->photo) : asset('storage/images-profil/default-profile.png') }}');
                                            min-height: 280px;
                                            max-height: 280px;
                                            ">
                                    </div>

                                    <div class="absolute bottom-0 left-0 right-0 px-5 py-2 text-center rounded-b-xl"
                                        style="background: hsla(0, 0%, 0%, 0.6);">
                                        <p class="text-xl font-medium text-white border-b-2">{{ $staf->name }}</p>
                                        <p class="font-medium text-white">{{ $staf->position }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button
                            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                            type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                            type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @else
                    <div class="bg-white p-4 text-center font-medium rounded-xl shadow-md">
                        Belum ada data
                    </div>
                @endif
            </section>

            <section class="w-full sm:w-1/2 lg:w-full">
                <h2 class="text-lg lg:text-3xl font-medium mb-4 border-b-4 border-gray-300">Agenda Hari Ini</h2>

                <ul class="list-none">
                    @include('components.list-event', [
                        'action' => '/auth/staf',
                    ])
                </ul>

            </section>
        </div>
    </div>

    <div>
        <h2 class="text-3xl font-medium mb-4 border-b-4 border-gray-300">Wilayah Desa</h2>
        <iframe class="w-full bg-white rounded-lg border shadow-md p-4"
            src="https://www.google.com/maps/d/embed?mid=1xHDUFoaDolUsr_mw34yRixEntf5feco&ehbc=2E312F"
            height="500"></iframe>
    </div>
@endsection

@section('script_head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
@endsection
