<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            DB::table('users')->insert([
                'name' => 'Pemilik Toko ' . $i,
                'role' => 'pemilik_toko',
                'email' => 'pemiliktoko' . $i . '@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
