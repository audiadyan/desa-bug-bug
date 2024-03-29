@extends('layouts.layout-public')

@section('main_content')
    <div class="flex justify-center mb-5">
        <div class="grow flex flex-col rounded-lg shadow-lg bg-white max-w-4xl p-6">
            <h2 class="text-gray-900 text-3xl font-medium mb-2 text-center">{{ $news->title }}</h2>
            <hr class="h-px my-1 bg-dark-200 border border-10">

            <div class="flex justify-between mb-5 space-x-3">
                <h4 class="flex items-center text-gray-600 text-sm font-medium">
                    <svg fill="currentColor" class="bi bi-person h-4 mr-1" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    {{ $news->user->name }}
                </h4>

                <h4 class="flex items-center text-gray-600 text-sm font-medium">
                    <svg fill="currentColor" class="bi bi-clock-history h-4 mr-1" viewBox="0 0 16 16">
                        <path
                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                        <path
                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    {{ $news->created_at->diffForHumans() }}
                </h4>
            </div>

            <div class="bg-cover bg-no-repeat bg-center rounded-lg mb-3"
                style="
                    background-image: url('{{ asset('storage/' . $news->image) }}');
                    height: 350px;
                    ">
            </div>

            <p class="text-black text-base mb-4">
                {!! $news->body !!}
            </p>
        </div>
    </div>
@endsection
