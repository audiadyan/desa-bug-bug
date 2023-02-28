@extends('layouts.layout-global')

@section('global_layout')
    <div class="relative flex mb-5 flex-1">
        <div class="absolute sm:relative w-full sm:w-60">
            @include('partials.sidebar-admin')
        </div>

        <main class="w-full">
            <div class="z-50 sm:ml-1 sticky top-0">
                @include('partials.navbar-admin')
            </div>

            <div class="mt-5 mx-10 sm:mx-5">
                <h1 class="card-title text-4xl pb-1 mb-3 border-b-4 border-gray-400 lg:hidden">
                    {{ $page_title }}
                </h1>

                @yield('admin_content')
            </div>
        </main>
    </div>

    @include('partials.footer-admin')
@endsection
