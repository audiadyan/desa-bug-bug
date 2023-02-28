<div class="bg-white rounded-xl border shadow-lg p-5 max-w-xl">
    <form action="{{ $action }}" method="post">
        @if ($edit)
            @method('put')
        @endif

        @csrf

        <div class="mb-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="nama" value="{{ old('name', $admin->name ?? '') }}"
                @if ($edit) disabled @endif required autofocus>
            @error('name')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
            <input type="text" name="username" id="username"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="username" value="{{ old('username', $admin->username ?? '') }}"
                @if ($edit) readonly="readonly" @endif required>
            @error('username')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="text" name="password" id="password" placeholder="password" value="{{ old('password') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required>
            @error('password')
                <div class="font-medium text-xs text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn w-full">Simpan</button>
    </form>
</div>
