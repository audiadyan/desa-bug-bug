<div class="navbar bg-base-100 rounded-l-lg">
    <div class="lg:flex-1">
        <a class="hidden lg:block btn btn-ghost normal-case text-xl">
            <h1 class="card-title text-4xl">{{ $page_title }}</h1>
        </a>

        <div class="sm:hidden mr-2" onclick="showHide('side-wrapper')" id="side-expand">
            <svg fill="currentColor"
                class="bi bi-arrow-bar-right w-7 h-7 p-1 rounded hover:bg-gray-200 hover:cursor-pointer"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z" />
            </svg>
        </div>
    </div>

    <div class="flex-1 lg:flex-none gap-2">
        <div class="form-control flex-1">
            <form action="" method="get">
                <input type="text" placeholder="Cari" class="input input-bordered w-full" name="search"
                    value="{{ request('search') }}" />
            </form>
        </div>

        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('storage/images-profil/default-profile.png') }}" />
                </div>
            </label>

            <ul tabindex="0" class="mt-2 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-32">
                <li><a href="/">Beranda</a></li>
                <li><a href="/auth/user">Profil</a></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
