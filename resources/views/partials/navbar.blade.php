<div class="relative overflow-hidden bg-no-repeat bg-cover rounded-b"
    style="
        background-position: 50%;
        background-image: url('{{ isset($dashboard->bg_navbar) ? asset('storage/' . $dashboard->bg_navbar) : asset('storage/images-background/default-navbar.jpg') }}');
        height: 150px;
        ">
</div>

<div class="container mb-5 text-gray-800 px-4 mx-auto sm:px-4 sticky top-16 sm:sticky sm:top-3 z-50">
    <div class="block rounded-lg shadow-lg py-4 px-2 md:px-10"
        style="
            margin-top: -60px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(15px);
            ">
        <div class="flex flex-col">
            <div class="flex justify-between items-center">
                <label
                    class="swap swap-rotate p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-blue-600 hover:text-white hover:shadow-lg active:bg-blue-800 active:shadow-lg">
                    <input type="checkbox" onclick="showHide('navbar')" />
                    <svg class="swap-off fill-current w-5 h-5" viewBox="0 0 512 512">
                        <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
                    </svg>
                    <svg class="swap-on fill-current w-5 h-5" viewBox="0 0 512 512">
                        <polygon
                            points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                    </svg>
                </label>

                <a href="/" class="flex items-center hover:cursor-default">
                    <div class="bg-cover bg-no-repeat bg-center rounded-sm mr-2"
                        style="
                            background-image: url('{{ isset($dashboard->logo) ? asset('storage/' . $dashboard->logo) : asset('storage/images-background/default-logo.png') }}');
                            height: 30px;
                            width: 30px;
                            ">
                    </div>

                    <div class="flex items-end space-x-1 hover:text-blue-600 hover:cursor-default">
                        <h2 class="font-medium text-2xl">Bug-Bug</h2>
                        <h6 class="text-xs font-medium hidden sm:block">Lombok Barat</h6>
                    </div>
                </a>

                @auth
                    <div class="dropdown dropdown-end mr-3">
                        <label tabindex="0" id="user-image">
                            <div class="bg-cover bg-no-repeat bg-center rounded-full hover:ring hover:ring-gray-400 hover:cursor-pointer"
                                style="
                            background-image: url('{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('storage/images-profil/default-profile.png') }}');
                            height: 30px;
                            width: 30px;
                            ">
                            </div>
                        </label>

                        <ul tabindex="0"
                            class="mt-2 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-32">
                            <li><a href="/auth/dashboard">Dashboard</a></li>
                            <li><a href="/auth/user">Profil</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="/login"
                        class="flex items-center px-3 py-2 text-dark font-medium text-xs leading-normal uppercase rounded {{ Request::is('login') ? 'text-blue-600 border-b-4 border-blue-600' : 'hover:bg-blue-600 hover:text-white hover:shadow-lg' }} focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 focus:text-white active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                        <svg class="mr-1" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                        Login
                    </a>
                @endauth
            </div>

            <hr class="h-px mt-1 bg-dark-200 border border-10">

            <div class="hidden sm:flex" id="navbar">
                <ul class="navbar-nav flex flex-col sm:flex-row sm:flex-center sm:space-x-3 list-style-none sm:mx-auto">
                    <li
                        class="nav-item p-2 hover:cursor-pointer {{ Request::is('/') ? 'text-blue-600 border-b-4 border-blue-600' : 'text-black hover:text-blue-400 hover:border-b-2 hover:border-blue-400' }}">
                        <a class="nav-link p-0" href="/">Beranda</a>
                    </li>

                    <li
                        class="nav-item p-2 hover:cursor-pointer {{ Request::is('information*') ? 'text-blue-600 border-b-4 border-blue-600' : 'text-black hover:text-blue-400 hover:border-b-2 hover:border-blue-400' }}">
                        <a class="nav-link p-0" href="/information">Informasi</a>
                    </li>

                    <li
                        class="dropdown dropdown-hover nav-item p-2 hover:cursor-pointer {{ Request::is('profile*') ? 'text-blue-600 border-b-4 border-blue-600' : 'text-black hover:text-blue-400 hover:border-b-2 hover:border-blue-400' }}">
                        <label tabindex="0" class="nav-link p-0"><a href="#">Profil Desa</a></label>
                        <ul tabindex="0"
                            class="text-black dropdown-content menu mt-2 p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="/profile/about">Tentang Desa</a></li>
                            <li><a href="/profile/statistic">Statistik</a></li>
                        </ul>
                    </li>

                    <li
                        class="dropdown dropdown-hover nav-item p-2 hover:cursor-pointer {{ Request::is('government*') ? 'text-blue-600 border-b-4 border-blue-600' : 'text-black hover:text-blue-400 hover:border-b-2 hover:border-blue-400' }}">
                        <label tabindex="0"><a class="nav-link p-0" href="#">Pemerintahan</a></label>
                        <ul tabindex="0"
                            class="text-black dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a href="/government/staf">Staf Desa</a></li>
                            <li><a class="text-gray-400 hover:bg-white hover:cursor-default">Struktur Organisasi</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-2 disabled text-gray-400">
                        <a class="nav-link p-0 disabled">Layanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
