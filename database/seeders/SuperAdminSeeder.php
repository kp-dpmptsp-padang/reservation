<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@dpmptsp.padang.go.id',
            'password' => Hash::make('password123'),
            'phone_number' => '081234567890',
            'role' => 'super-admin'
        ]);
 
        User::create([
            'name' => 'Admin',
            'email' => 'admin@dpmptsp.padang.go.id', 
            'password' => Hash::make('password123'),
            'phone_number' => '081234567891',
            'role' => 'admin'
        ]);
    }
}
