<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'admin',
            'email' => 'admin@ittoday.id',
            'password' => Hash::make('admin123'),
            'whatsapp' => '089608703393',
            'alamat' => 'Kota1 Ciampea Benteng Jl. Dadali Blok G11 BTN Puskopad 16620',
            'ongkir' => 5000,
        ]);

        User::create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('test123'),
            'whatsapp' => '089876543210',
            'alamat' => null,
            'ongkir' => null,
        ]);
    }
}
