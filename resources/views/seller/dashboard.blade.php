<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard Seller') }}
      </h2>
  </x-slot>

  <div class="flex">
      <!-- Sidebar Menu -->
      <aside class="w-64 bg-white border-r min-h-screen">
          <div class="p-6">
              <h3 class="text-lg font-semibold mb-4">Menu Seller</h3>
              <ul class="space-y-3">
                  <li>
                      <a href="{{ route('products.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('products.*') ? 'bg-blue-200 font-semibold' : '' }}">
                          📦 Produk
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('seller.profile') }}" class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('profile.*') ? 'bg-blue-200 font-semibold' : '' }}">
                          👤 Profil
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('notifications.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('notifications.*') ? 'bg-blue-200 font-semibold' : '' }}">
                          🔔 Notifikasi
                      </a>
                  </li>
              </ul>
          </div>
      </aside>

      <!-- Content -->
      <main class="flex-1 p-6 bg-gray-50">
          <h1 class="text-2xl font-bold mb-4">Selamat datang, {{ auth()->user()->name }}!</h1>
          <p class="text-gray-700">Kelola produk, profil, dan lihat notifikasi terbaru dari sini.</p>
      </main>
  </div>
</x-app-layout>
