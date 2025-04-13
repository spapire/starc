@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Daftar Sebagai User</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.user.submit') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Password</label>
            <input type="password" name="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Daftar
            </button>
        </div>
    </form>
</div>
@endsection
