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
            'alamat' => null,
            'ongkir' => null,
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
