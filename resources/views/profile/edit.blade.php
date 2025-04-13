<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Profil
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md mt-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Profile Photo -->
            <div class="mb-4">
                <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                @if ($user->profile_photo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="w-20 h-20 object-cover rounded-full">
                    </div>
                @endif
                <input type="file" name="profile_photo" id="profile_photo"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
