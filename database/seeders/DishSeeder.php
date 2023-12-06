<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::all()->count();

        $dishes = config("dishes");

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->restaurant_id = rand(1, $restaurants);
            $new_dish->name = $dish["name"];
            $new_dish->description = $dish["description"];
            $new_dish->image = "https://www.biochetasi.it/wp-content/uploads/2019/09/I-bambini-e-il-cibo-spazzatura.-Meglio-non-esagerare-1-biochetasi-1000x600.jpg";
            $new_dish->price = $dish["price"];
            $new_dish->available = $dish["available"];
            $new_dish->course = $dish["course"];
            $new_dish->ingredients = implode(",", $dish["ingredients"]);
            $new_dish->slug = Str::slug($new_dish->name, '-');
            $new_dish->save();
        }
    }
}
