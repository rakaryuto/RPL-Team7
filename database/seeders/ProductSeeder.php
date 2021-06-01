<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // coffee 1
        Product::create(['coffee_id' => 1,'pack_id' => 1,'size_id' => 2,'extrashot' => 0,'stock' => 50,'harga' => 35000,]);
        Product::create(['coffee_id' => 1,'pack_id' => 1,'size_id' => 2,'extrashot' => 1,'stock' => 50,'harga' => 40000,]);
        
        Product::create(['coffee_id' => 1,'pack_id' => 1,'size_id' => 3,'extrashot' => 0,'stock' => 50,'harga' => 73000,]);
        Product::create(['coffee_id' => 1,'pack_id' => 1,'size_id' => 3,'extrashot' => 1,'stock' => 50,'harga' => 78000,]);
        
        Product::create(['coffee_id' => 1,'pack_id' => 2,'size_id' => 3,'extrashot' => 0,'stock' => 50,'harga' => 85000,]);
        Product::create(['coffee_id' => 1,'pack_id' => 2,'size_id' => 3,'extrashot' => 1,'stock' => 50,'harga' => 90000,]);
        
        Product::create(['coffee_id' => 1,'pack_id' => 3,'size_id' => 3,'extrashot' => 0,'stock' => 50,'harga' => 68000,]);
        Product::create(['coffee_id' => 1,'pack_id' => 3,'size_id' => 3,'extrashot' => 1,'stock' => 50,'harga' => 73000,]);
        
        
        
        
        
        // coffee 2
        Product::create(['coffee_id' => 2,'pack_id' => 1,'size_id' => 2,'extrashot' => 0,'stock' => 50,'harga' => 39000,]);
        Product::create(['coffee_id' => 2,'pack_id' => 1,'size_id' => 3,'extrashot' => 0,'stock' => 50,'harga' => 77000,]);
        Product::create(['coffee_id' => 2,'pack_id' => 2,'size_id' => 3,'extrashot' => 0,'stock' => 50,'harga' => 89000,]);
        Product::create(['coffee_id' => 2,'pack_id' => 3,'size_id' => 3,'extrashot' => 0,'stock' => 50,'harga' => 70000,]);
        
        
        
        
        
        // coffee 3
        Product::create(['coffee_id' => 3,'pack_id' => 2,'size_id' => 1,'extrashot' => 0,'stock' => 50,'harga' => 37000,]);
        Product::create(['coffee_id' => 3,'pack_id' => 2,'size_id' => 1,'extrashot' => 1,'stock' => 50,'harga' => 42000,]);
        Product::create(['coffee_id' => 3,'pack_id' => 3,'size_id' => 1,'extrashot' => 0,'stock' => 50,'harga' => 30000,]);
        Product::create(['coffee_id' => 3,'pack_id' => 3,'size_id' => 1,'extrashot' => 1,'stock' => 50,'harga' => 35000,]); 
        
        
        
        
        
        // coffee 4
        Product::create(['coffee_id' => 4,'pack_id' => 1,'size_id' => 1,'extrashot' => 0,'stock' => 50,'harga' => 37000,]);
        Product::create(['coffee_id' => 4,'pack_id' => 1,'size_id' => 1,'extrashot' => 1,'stock' => 50,'harga' => 42000,]);

    }
}
