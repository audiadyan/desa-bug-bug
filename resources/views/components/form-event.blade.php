@extends('layouts.layout-admin')

@section('admin_content')
    <form action="{{ $action }}" method="post" class="bg-white max-w-5xl p-6 rounded-lg shadow-md">
        @if ($edit)
            @method('put')
        @endif
        @csrf

        <div class="form-control mb-5">
            <label class="font-medium text-md mb-1">Nama Kegiatan</label>
            <input type="text" placeholder="Nama Kegiatan" class="input input-bordered max-w-xl" id="name" name="name"
                value="{{ old('name', $event->name ?? '') }}" />
            @error('name')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control mb-5 flex flex-col">
            <div class="flex justify-between max-w-xl">
                <label class="font-medium text-md mb-1">Jadwal Pelaksanaan</label>
                <div>{{ $edit ? date('l, j F Y | H:i', strtotime($event->time)) : '' }}</div>
            </div>
            <input type="datetime-local" placeholder="{{ $edit ? 'Ganti Tanggal / Waktu' : 'Pilih Tanggal' }}"
                class="input input-bordered max-w-xl hover:cursor-pointer" id="time" name="time" />
            @error('time')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-control mb-5">
            <label class="font-medium text-md mb-1">Lokasi Kegiatan</label>
            <input type="text" placeholder="Lokasi Kegiatan" class="input input-bordered max-w-xl" id="location"
                name="location" value="{{ old('location', $event->location ?? '') }}" />
            @error('location')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 flex flex-col">
            <label class="font-medium text-md mb-1">Informasi Lainnya <span class="text-xs">(opsional)</span></label>
            @error('body')
                <div class="font-medium text-xs text-red-400 mb-1">{{ $message }}</div>
            @enderror
            <textarea placeholder="Informasi lain" class="textarea textarea-bordered textarea-lg w-full" id="body"
                name="body">{{ old('body', $event->body ?? '') }}</textarea>
        </div>

        <button class="btn w-full">Simpan / Posting</button>
    </form>
@endsection

@section('script_head')
    {{-- flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('script')
    {{-- flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("input[type=datetime-local]", {
            minDate: "today",
            enableTime: true,
            altInput: true,
            altFormat: "l, j F Y | H:i",
        });
    </script>
@endsection
