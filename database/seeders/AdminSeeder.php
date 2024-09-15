<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Buat akun admin
          User::create([
            'name' => 'Admin',  // Nama admin
            'email' => 'admin001@gmail.com', // Email admin
            'password' => Hash::make('password'),
            'is_admin' => true,  // Menandai user sebagai admin
        ]);
    }
}
