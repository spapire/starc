<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Sebagai Seller') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-md">
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.seller') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="name" value="Nama Toko" />
                        <x-text-input id="name" name="name" class="block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="email" value="Email Toko" />
                        <x-text-input id="email" name="email" type="email" class="block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="phone" value="Nomor Telepon" />
                        <x-text-input id="phone" name="phone" class="block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="address" value="Alamat" />
                        <textarea id="address" name="address" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="bio" value="Deskripsi Toko" />
                        <textarea id="bio" name="bio" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">{{ old('bio') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="whatsapp_url" value="Link WhatsApp (opsional)" />
                        <x-text-input id="whatsapp_url" name="whatsapp_url" class="block w-full" placeholder="https://wa.me/62xxxxxxx" />
                    </div>

                    <x-primary-button class="mt-4">
                        Daftar Sebagai Seller
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
