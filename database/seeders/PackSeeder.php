<?php

namespace Database\Seeders;

use App\Models\Pack;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pack::create([
            'nama' => 'PET',
        ]);

        Pack::create([
            'nama' => 'ECO',
        ]);

        Pack::create([
            'nama' => 'ECORefill',
        ]);
    }
}
