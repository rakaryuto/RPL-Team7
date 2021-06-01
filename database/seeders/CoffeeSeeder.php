<?php

namespace Database\Seeders;

use App\Models\Coffee;
use Illuminate\Database\Seeder;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coffee::create([
            'nama' => 'Premium Aren Latte',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit laborum nostrum quasi, quibusdam
            alias error, vero tempore, veniam perspiciatis optio accusantium! Ut magni esse tenetur voluptatum, vero
            eum quibusdam laboriosam? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae iure explicabo
            eos maxime temporibus voluptatum laboriosam quasi quas accusamus ab ipsum enim nam aliquid, accusantium
            fuga natus repellat. Quo, iste! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat
            voluptas, aliquid asperiores doloribus totam iure alias impedit voluptates repellat nesciunt et architecto
            incidunt sunt eum non sint magni illo! premium aren latte',
        ]);

        Coffee::create([
            'nama' => 'Premium Matcha Latte',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit laborum nostrum quasi, quibusdam
            alias error, vero tempore, veniam perspiciatis optio accusantium! Ut magni esse tenetur voluptatum, vero
            eum quibusdam laboriosam? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae iure explicabo
            eos maxime temporibus voluptatum laboriosam quasi quas accusamus ab ipsum enim nam aliquid, accusantium
            fuga natus repellat. Quo, iste! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat
            voluptas, aliquid asperiores doloribus totam iure alias impedit voluptates repellat nesciunt et architecto
            incidunt sunt eum non sint magni illo! premium matcha latte',
        ]);
        
        Coffee::create([
            'nama' => 'Gayo Wine Chill Brew',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit laborum nostrum quasi, quibusdam
            alias error, vero tempore, veniam perspiciatis optio accusantium! Ut magni esse tenetur voluptatum, vero
            eum quibusdam laboriosam? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae iure explicabo
            eos maxime temporibus voluptatum laboriosam quasi quas accusamus ab ipsum enim nam aliquid, accusantium
            fuga natus repellat. Quo, iste! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat
            voluptas, aliquid asperiores doloribus totam iure alias impedit voluptates repellat nesciunt et architecto
            incidunt sunt eum non sint magni illo! gayo wine chill brew',
        ]);
        
        Coffee::create([
            'nama' => 'Premium Cold Brew',
            'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit laborum nostrum quasi, quibusdam
            alias error, vero tempore, veniam perspiciatis optio accusantium! Ut magni esse tenetur voluptatum, vero
            eum quibusdam laboriosam? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae iure explicabo
            eos maxime temporibus voluptatum laboriosam quasi quas accusamus ab ipsum enim nam aliquid, accusantium
            fuga natus repellat. Quo, iste! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quaerat
            voluptas, aliquid asperiores doloribus totam iure alias impedit voluptates repellat nesciunt et architecto
            incidunt sunt eum non sint magni illo! premium cold brew',
        ]);
    }
}
