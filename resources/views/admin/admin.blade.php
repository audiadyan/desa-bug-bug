@extends('layouts.layout-admin')

@section('admin_content')
    @if (session()->has('success'))
        @include('components.alert-success')
    @endif

    @php
        $num = 1;
        if (isset($_GET['page'])) {
            $num = ($_GET['page'] - 1) * 10 + 1;
        }
    @endphp

    <div class="mt-8 mb-4">
        <a href="/auth/admin/create"
            class="px-4 py-2 rounded-md bg-blue-500 text-blue-100 hover:bg-blue-600 hover:text-white shadow-md">Tambah</a>
    </div>

    <div class="overflow-x-auto w-full border rounded-xl shadow-md">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nomor HP</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <th>
                            {{ $num }}
                            @php $num++; @endphp
                        </th>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="{{ $admin->photo ? asset('storage/' . $admin->photo) : asset('storage/images-profil/default-profile.png') }}"
                                            alt="Photo Admin" />
                                    </div>
                                </div>
                                <div class="font-bold">{{ Str::limit($admin->name, 30) }}</div>
                            </div>
                        </td>
                        <td>
                            {{ $admin->username }}
                        </td>
                        <td>
                            {{ $admin->phone }}
                        </td>
                        <th>
                            <div class="flex justify-end space-x-2">
                                <form action="/auth/admin/{{ $admin->username }}/change" method="post">
                                    @method('put')
                                    @csrf

                                    <button
                                        onclick="return confirm('Perhatian!!! Anda tidak akan lagi menjadi Super Admin. Apakah ingin dilanjutkan?')"
                                        title="Jadikan Admin"><svg class="w-6 h-6 text-yellow-600 hover:text-yellow-900"
                                            fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
                                            <path
                                                d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
                                            <path
                                                d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                                        </svg></button>
                                </form>

                                <a href="/auth/admin/{{ $admin->username }}/edit"
                                    class="text-indigo-600 hover:text-indigo-900" title="Edit Admin">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <form action="/auth/admin/{{ $admin->username }}" method="post">
                                    @method('delete')
                                    @csrf

                                    <button onclick="return confirm('Apakah Anda yakin?')" title="Hapus Admin"><svg
                                            class="w-6 h-6 text-red-600 hover:text-red-800 hover:cursor-pointer"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg></button>
                                </form>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (sizeOf($admins) == 0)
            <div class="bg-white p-4 text-center font-medium rounded-xl shadow-md">
                Belum ada data
            </div>
        @endif
    </div>

    <div class="mt-5 d-flex justify-content-start">
        @if (request('search'))
            {{ $admins->appends(['search' => request('search')])->links() }}
        @else
            {{ $admins->links() }}
        @endif
    </div>
@endsection
