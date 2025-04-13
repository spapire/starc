<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        $sellerRole = Role::where('name', 'seller')->first();

        $seller = User::firstOrCreate(
            ['email' => 'seller@starc.com'],
            [
                'id' => (string) Str::uuid(),
                'username' => 'seller',
                'name' => 'Seller Starc',
                'password' => Hash::make('sellerstarc'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        $seller->roles()->syncWithoutDetaching([$sellerRole->id]);
    }
}
