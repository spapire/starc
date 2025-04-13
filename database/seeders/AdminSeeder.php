<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Cari role admin
        $adminRole = Role::where('name', 'admin')->first();

        // Buat user admin
        $admin = User::create([
            'id' => (string) Str::uuid(),
            'username' => 'adminstarc',
            'name' => 'Administrator',
            'email' => 'admin@starc.com',
            'password' => Hash::make('adminstarc'),
        ]);

        // Beri role admin
        $admin->roles()->attach($adminRole->id);
    }
}
