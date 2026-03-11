<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Margherita', 'price' => 28.00, 'description' => 'Sos pomidorowy, mozzarella, bazylia', 'image' => 'margherita.png'],
            ['name' => 'Capricciosa', 'price' => 34.00, 'description' => 'Sos pomidorowy, mozzarella, szynka, pieczarki', 'image' => 'capricciosa.png'],
            ['name' => 'Pepperoni', 'price' => 36.00, 'description' => 'Sos pomidorowy, mozzarella, pepperoni', 'image' => 'pepperoni.png'],
            ['name' => 'Diavola', 'price' => 37.00, 'description' => 'Sos pomidorowy, mozzarella, salami piccante, chili', 'image' => 'diavola.png'],
            ['name' => 'Funghi', 'price' => 33.00, 'description' => 'Sos pomidorowy, mozzarella, pieczarki', 'image' => 'funghi.png'],
            ['name' => 'Quattro Formaggi', 'price' => 39.00, 'description' => 'Mozzarella, gorgonzola, parmezan, provolone', 'image' => 'quattro_formaggi.png'],
            ['name' => 'Hawajska', 'price' => 35.00, 'description' => 'Sos pomidorowy, mozzarella, szynka, ananas', 'image' => 'hawajska.png'],
            ['name' => 'Wiejska', 'price' => 41.00, 'description' => 'Sos pomidorowy, mozzarella, kiełbasa, cebula, ogorek', 'image' => 'wiejska.png'],
        ];

        foreach ($items as $item) {
            MenuItem::create($item);
        }
    }
}
