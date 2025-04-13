<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Tambah Produk
      </h2>
  </x-slot>

  <div class="max-w-3xl mx-auto py-8">
      @if (session('success'))
          <div class="mb-4 text-green-600">
              {{ session('success') }}
          </div>
      @endif

      <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Kategori</label>
              <select name="category_id" class="w-full border rounded p-2">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Nama Produk</label>
              <input type="text" name="name" class="w-full border rounded p-2" required>
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Deskripsi</label>
              <textarea name="description" class="w-full border rounded p-2"></textarea>
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Harga</label>
              <input type="number" name="price" class="w-full border rounded p-2" required>
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Stok</label>
              <input type="number" name="stock" class="w-full border rounded p-2" required>
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Status</label>
              <select name="status" class="w-full border rounded p-2">
                  <option value="active">Aktif</option>
                  <option value="inactive">Tidak Aktif</option>
              </select>
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Thumbnail</label>
              <input type="file" name="thumbnail" class="w-full border rounded p-2">
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Link Tokopedia</label>
              <input type="url" name="link_tokopedia" class="w-full border rounded p-2">
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Link Shopee</label>
              <input type="url" name="link_shopee" class="w-full border rounded p-2">
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Link GoFood</label>
              <input type="url" name="link_gofood" class="w-full border rounded p-2">
          </div>

          <div class="mb-4">
              <label class="block mb-1 font-semibold">Link ShopeeFood</label>
              <input type="url" name="link_shopee_food" class="w-full border rounded p-2">
          </div>

          <div>
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan Produk</button>
          </div>
      </form>
  </div>
</x-app-layout>
