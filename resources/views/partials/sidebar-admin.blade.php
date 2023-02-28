<div class="hidden relative z-50 min-h-full flex sm:flex flex-col text-gray-700 bg-white rounded-r-lg"
    style="box-shadow: 2px 5px 5px rgb(165, 165, 165);" id="side-wrapper">
    <div class="flex items-center w-full px-3 mt-3">
        <a href="/">
            <svg class="w-8 h-8 fill-current" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
            </svg>
        </a>

        <div class="flex flex-col">
            <span class="ml-2 text-sm font-bold">Selamat Datang</span>
            <span class="ml-2 text-sm font-bold">{{ auth()->user()->name }}</span>
        </div>

        <div onclick="vNavImage('side-wrapper', 'user-image')" class="sm:hidden flex items-center">
            <svg fill="currentColor"
                class="absolute w-7 h-7 bi bi-arrow-bar-left right-0 mr-1 p-1 rounded hover:bg-gray-200 hover:cursor-pointer"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z" />
            </svg>
        </div>
    </div>

    <div class="flex flex-col items-center mt-3 px-2 border-t border-gray-300">
        <div class="w-full">
            <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="/auth/dashboard">
                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-2 text-sm font-medium">Dasboard</span>
            </a>
        </div>

        <div class="w-full">
            <label
                class="swap flex items-center justify-between w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 hover:cursor-pointer">
                <div class="flex inline items-center">
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg>

                    <span class="ml-2 text-sm font-medium">Informasi</span>
                </div>

                <label class="swap p-2 text-sm text-gray-500 rounded-lg">
                    <input type="checkbox" onclick="vSidebarItem('sidebar-informasi')" id="label-informasi" />
                    <svg width="16" height="16" fill="currentColor" class="swap-off bi bi-caret-down"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                    </svg>
                    <svg width="16" height="16" fill="currentColor" class="swap-on bi bi-caret-up"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
                    </svg>
                </label>
            </label>

            <div class="mx-4 hidden mt-2" id="sidebar-informasi">
                <a class="flex items-center w-full h-8 px-3 mb-2 rounded hover:bg-gray-300" href="/auth/event">
                    <span class="ml-2 text-sm font-medium">Agenda</span>
                </a>

                <a class="flex items-center w-full h-8 px-3 rounded hover:bg-gray-300" href="/auth/news">
                    <span class="ml-2 text-sm font-medium">Berita</span>
                </a>
            </div>
        </div>

        <div class="w-full">
            <label
                class="swap flex items-center justify-between w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 hover:cursor-pointer">
                <div class="flex inline items-center">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M14 19.9999V9.82831C14 9.29787 13.7893 8.78916 13.4142 8.41409L10.4142 5.41409C9.63317 4.63304 8.36684 4.63304 7.58579 5.41409L4.58579 8.41409C4.21071 8.78916 4 9.29787 4 9.82831V17.9999C4 19.1045 4.89542 19.9999 5.99998 19.9999L9 19.9999M14 19.9999L19 19.9999C20.1046 19.9999 21 19.1045 21 17.9999V12.8284C21 12.2979 20.7893 11.7892 20.4142 11.4141L18.4142 9.41415C17.6332 8.6331 16.3668 8.6331 15.5858 9.41415L14 10.9999M14 19.9999L9 19.9999M9 19.9999V15.9999"
                            stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="ml-2 text-sm font-medium">Profil Desa</span>
                </div>

                <label class="swap p-2 text-sm text-gray-500 rounded-lg">
                    <input type="checkbox" onclick="vSidebarItem('sidebar-profil')" id="label-profil" />
                    <svg width="16" height="16" fill="currentColor" class="swap-off bi bi-caret-down"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                    </svg>
                    <svg width="16" height="16" fill="currentColor" class="swap-on bi bi-caret-up"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
                    </svg>
                </label>
            </label>

            <div class="mx-4 hidden mt-2" id="sidebar-profil">
                <a class="flex items-center w-full h-8 px-3 mb-2 rounded hover:bg-gray-300" href="/auth/about">
                    <span class="ml-2 text-sm font-medium">Tentang Desa</span>
                </a>

                <a class="flex items-center w-full h-8 px-3 rounded hover:bg-gray-300" href="/auth/statistic">
                    <span class="ml-2 text-sm font-medium">Statistik</span>
                </a>
            </div>
        </div>

        <div class="w-full">
            <label
                class="swap flex items-center justify-between w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 hover:cursor-pointer">
                <div class="flex inline items-center">
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>

                    <span class="ml-2 text-sm font-medium">Pemerintahan</span>
                </div>

                <label class="swap p-2 text-sm text-gray-500 rounded-lg">
                    <input type="checkbox" onclick="vSidebarItem('sidebar-pemerintahan')" id="label-pemerintahan" />
                    <svg width="16" height="16" fill="currentColor" class="swap-off bi bi-caret-down"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                    </svg>
                    <svg width="16" height="16" fill="currentColor" class="swap-on bi bi-caret-up"
                        viewBox="0 0 16 16">
                        <path
                            d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
                    </svg>
                </label>
            </label>

            <div class="mx-4 hidden mt-2" id="sidebar-pemerintahan">
                <a class="flex items-center w-full h-8 px-3 mb-2 rounded hover:bg-gray-300" href="/auth/staf">
                    <span class="ml-2 text-sm font-medium">Staf Desa</span>
                </a>
                <a class="flex items-center w-full h-8 px-3 mb-2 rounded">
                    <span class="ml-2 text-sm font-medium text-gray-400 truncate">Struktur Organisasi</span>
                </a>
            </div>
        </div>

        <div class="w-full">
            <a class="flex items-center w-full h-12 px-3 mt-2">
                <svg class="w-6 h-6 bi bi-printer" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                    <path
                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                </svg>
                <span class="ml-2 text-sm font-medium text-gray-400">Layanan</span>
            </a>
        </div>

        @can('superadmin')
            <div class="w-full border mt-2"></div>

            <div class="w-full mb-2">
                <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300" href="/auth/admin">
                    <svg fill="stroke" class="w-6 h-6 bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                    </svg>
                    <span class="ml-2 text-sm font-medium">Admin</span>
                </a>
            </div>
        @endcan
    </div>
</div>
