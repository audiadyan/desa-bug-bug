@extends('layouts.layout-global')

@section('global_layout')
    @if (session()->has('loginError'))
        <section class="absolute w-full">
            <div id="error-login" class="max-w-xl mx-auto mt-2 flex p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium">
                    {{ session('loginError') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8"
                    onclick="showHide('error-login')" aria-label="Close">

                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </section>
    @endif

    <div class="min-h-screen py-6 flex flex-col justify-center overflow-hidden bg-cover sm:py-12"
        style="background-image: url('{{ isset($dashboard->bg_login) ? asset('storage/' . $dashboard->bg_login) : asset('storage/images-background/default-login.jpg') }}');">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:w-[500px] sm:rounded-3xl sm:p-14">
                <div class="max-w-md mx-auto">
                    <div class="text-center">
                        <h1 class="text-4xl font-medium">Login</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form action="/login" method="post">
                                @csrf

                                <div class="relative mb-6">
                                    <input autocomplete="off" id="username" name="username" type="text"
                                        class="bg-white peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                        placeholder="username" value="{{ old('username') }}" autofocus required />
                                    <label for="username"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
                                </div>

                                <div class="relative mb-2">
                                    <input autocomplete="off" id="password" name="password" type="password"
                                        class="bg-white peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                        placeholder="password" required />
                                    <label for="password"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                </div>

                                <div class="flex justify-end mb-2">
                                    <p class="text-sm text-gray-800">
                                        Lupa password?
                                        <a href="#modal-contact-admin"
                                            class="font-medium text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">
                                            Hubungi Admin
                                        </a>
                                    </p>
                                </div>

                                <div class="relative text-center">
                                    <button type="submit"
                                        class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        Login
                                    </button>

                                    <p class="text-sm font-semibold mt-2 pt-1 mb-0 text-left">
                                        Belum punya akun?
                                        <button
                                            class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">
                                            Hubungi Admin
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal hubungi Admin --}}
    <div class="modal" id="modal-contact-admin">
        <div class="modal-box relative">
            <h2 class="font-bold text-xl text-center">Hubungi Admin di Bawah!</h2>

            <div class="mx-auto bg-cover bg-no-repeat bg-center rounded-xl mt-3 border shadow-lg"
                style="
                    background-image: url('{{ $admin[0]->photo ? asset('storage/' . $admin[0]->photo) : asset('storage/images-profil/default-profile.png') }}');
                    height: 150px;
                    width: 150px;
                    ">
            </div>

            <h3 class="font-semibold text-xl text-center my-2">{{ $admin[0]->name }}</h3>
            <a href="https://wa.me/{{ $admin[0]->phone }}">
                <div
                    class="flex justify-center space-x-2 items-center p-2 border-4 border-dashed hover:border-green-400 rounded-xl max-w-fit mx-auto">
                    <svg class="bi bi-whatsapp h-6 fill-current text-green-600" viewBox="0 0 16 16">
                        <title>Whatsapp</title>
                        <path
                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>

                    <div>{{ $admin[0]->phone }}</div>
                </div>
            </a>

            <div class="modal-action absolute right-5 bottom-5">
                <a href="#" class="btn">Oke!</a>
            </div>
        </div>
    </div>
@endsection
