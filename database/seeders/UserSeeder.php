<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Super Admin',
            'alamat' => 'Denpasar',
            'no_hp' => '08743743',
            'jenis_kelamin' => 'laki-laki',
            'password' => bcrypt('superadmin123'),
            'email' => 'superadmin@gmail.com',
            'role' => 'super admin'
        ]);

        User::create([
            'nama' => 'Admin',
            'alamat' => 'Denpasar',
            'no_hp' => '0873683743',
            'jenis_kelamin' => 'laki-laki',
            'password' => bcrypt('admin123'),
            'email' => 'admin@gmail.com',
            'role' => 'admin'
        ]);

        User::create([
            'nama' => 'User',
            'alamat' => 'Denpasar',
            'no_hp' => '08736854743',
            'jenis_kelamin' => 'perempuan',
            'password' => bcrypt('user123'),
            'email' => 'user@gmail.com',
            'role' => 'user'
        ]);
    }
}
