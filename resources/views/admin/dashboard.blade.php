<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Dashboard Administrator
      </h2>
  </x-slot>

  <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
          <a href="{{ route('admin.categories') }}" class="block px-4 py-2 bg-indigo-600 text-white rounded">
              🗂️ Kelola Kategori Produk
          </a>

          <a href="{{ route('admin.users') }}" class="block px-4 py-2 bg-green-600 text-white rounded">
              👥 Kelola Pengguna
          </a>

          <a href="{{ route('admin.reports') }}" class="block px-4 py-2 bg-red-500 text-white rounded">
              📊 Laporan & Aktivitas
          </a>
      </div>
  </div>
</x-app-layout>
