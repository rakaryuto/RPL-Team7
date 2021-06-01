<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'nama' => '350ml',
        ]);
        
        Size::create([
            'nama' => '500ml',
        ]);
        
        Size::create([
            'nama' => '1000ml',
        ]);
    }
}
