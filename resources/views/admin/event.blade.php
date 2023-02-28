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

    <div class="max-w-7xl mx-auto">
        <div class="mt-8 mb-4">
            <a href="/auth/event/create"
                class="px-4 py-2 rounded-md bg-blue-500 text-blue-100 hover:bg-blue-600 hover:text-white">Tambah</a>
        </div>

        <div class="overflow-x-auto w-full border rounded-xl shadow-md">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Waktu</th>
                        <th>Oleh</th>
                        <th>Terakhir Edit</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th>
                                {{ $num }}
                                @php $num++; @endphp
                            </th>
                            <td>
                                <div class="font-bold">{{ Str::limit($event->name, 30) }}</div>
                            </td>
                            <td>
                                {{ $event->time }}
                            </td>
                            <td>
                                {{ $event->user->name ?? '-' }}
                            </td>
                            <td>
                                {{ $event->editor->name ?? '-' }}
                            </td>
                            <th>
                                <div class="flex justify-end space-x-2">
                                    <a href="/auth/event/{{ $event->slug }}/edit"
                                        class="text-indigo-600 hover:text-indigo-900" title="Edit Event">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form action="/auth/event/{{ $event->slug }}" method="post">
                                        @method('delete')
                                        @csrf

                                        <button onclick="return confirm('Apakah Anda yakin?')" title="Hapus Event"><svg
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

            @if (sizeOf($events) == 0)
                <div class="bg-white p-4 text-center font-medium rounded-xl shadow-md">
                    Belum ada data
                </div>
            @endif
        </div>

        <div class="mt-5 d-flex justify-content-start">
            @if (request('search'))
                {{ $events->appends(['search' => request('search')])->links() }}
            @else
                {{ $events->links() }}
            @endif
        </div>
    </div>
@endsection
