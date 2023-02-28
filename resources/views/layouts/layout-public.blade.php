@extends('layouts.layout-global')

@section('global_layout')
    @include('partials.navbar')

    <main class="mx-8 mb-auto sm:mx-16">
        <div class="container mx-auto max-w-5xl">
            @yield('main_content')
        </div>
    </main>

    @include('partials.footer')
@endsection