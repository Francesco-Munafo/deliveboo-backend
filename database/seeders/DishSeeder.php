<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = Restaurant::all()->count();
        $dishes = config("dishes");

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->restaurant_id = rand(1, $restaurants);
            $new_dish->name = $dish["name"];
            $new_dish->description = $dish["description"];

            // Ottieni l'immagine direttamente dall'URL usando file_get_contents
            $image = file_get_contents('https://source.unsplash.com/600x400/?food');

            // Salva l'immagine nel filesystem
            $imageName = 'dish_' . time() . '.jpg'; // Nome unico per l'immagine
            Storage::put('placeholders/' . $imageName, $image);

            // Salva il percorso dell'immagine nel campo dell'oggetto Dish
            $new_dish->image = 'placeholders/' . $imageName;

            $new_dish->price = $dish["price"];
            $new_dish->available = $dish["available"];
            $new_dish->course = rand(1, 7);
            $new_dish->ingredients = implode(",", $dish["ingredients"]);
            $new_dish->slug = Str::slug($new_dish->name, '-');
            $new_dish->save();
        }
    }
}
