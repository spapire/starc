<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profil Kamu
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-md shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Edit Profile -->
            <a href="{{ route('profile.edit') }}" class="p-4 bg-blue-100 hover:bg-blue-200 rounded-md shadow text-blue-800">
                <h3 class="text-lg font-semibold">Edit Profil</h3>
                <p>Perbarui data pribadi kamu.</p>
            </a>

            <!-- Ganti Foto -->
            <a href="{{ route('profile.edit') }}" class="p-4 bg-green-100 hover:bg-green-200 rounded-md shadow text-green-800">
                <h3 class="text-lg font-semibold">Ganti Foto</h3>
                <p>Unggah foto profil baru.</p>
            </a>

            <!-- Liked Produk -->
            <a href="#" class="p-4 bg-yellow-100 hover:bg-yellow-200 rounded-md shadow text-yellow-800">
                <h3 class="text-lg font-semibold">Produk Disukai</h3>
                <p>Lihat daftar produk yang kamu sukai.</p>
            </a>

            <!-- Komentar -->
            <a href="#" class="p-4 bg-purple-100 hover:bg-purple-200 rounded-md shadow text-purple-800">
                <h3 class="text-lg font-semibold">Komentar</h3>
                <p>Lihat komentar yang pernah kamu buat.</p>
            </a>
        </div>
    </div>
</x-app-layout>
