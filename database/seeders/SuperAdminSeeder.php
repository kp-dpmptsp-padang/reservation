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
 
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => 'Admin ' . $i,
                'email' => 'admin' . $i . '@dpmptsp.padang.go.id',
                'password' => Hash::make('password123'),
                'phone_number' => '08123456789' . $i,
                'role' => 'admin'
            ]);
        }
    }
}
