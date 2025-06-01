<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'علی محمدی',
                'mobile' => '09120000001',
                'password' => Hash::make('password1'),
                'status' => 'active',
                'base_role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمدرضا حسنی',
                'mobile' => '09120000002',
                'password' => Hash::make('password2'),
                'status' => 'active',
                'base_role' => 'client.php',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'رضا اسدی',
                'mobile' => '09120000003',
                'password' => Hash::make('password3'),
                'status' => 'inactive',
                'base_role' => 'client.php',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'علی پالوانه',
                'mobile' => '09120000004',
                'password' => Hash::make('password4'),
                'status' => 'active',
                'base_role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مسعود مرتضوی',
                'mobile' => '09120000005',
                'password' => Hash::make('password5'),
                'status' => 'inactive',
                'base_role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
