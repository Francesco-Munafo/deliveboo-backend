<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_restaurant = new Restaurant();
        $new_restaurant->name = 'Trattoria da Mario';
        $new_restaurant->slug = Str::slug($new_restaurant->name, '-');
        $new_restaurant->address = 'Via dei Mille, 78';
        $new_restaurant->description = 'Il nostro ristorante è molto bello, siediti a mangia roba buona';
        $new_restaurant->image = 'https://www.ristoranteallalega.com/photos/ristorante.jpg';
        $new_restaurant->save();
    }
}
