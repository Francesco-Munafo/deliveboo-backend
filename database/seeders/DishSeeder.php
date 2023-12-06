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

        $dishes = [
            [
                "name" => "pasta con tonno",
                "description" => "cucinata al dente.",
                "image" => "https://www.giallozafferano.it/images/221-22126/Mezze-maniche-al-tonno_650x433_wm.jpg",
                "price" => 12.50,
                "available" => true,
                "course" => "primo piatto",
                "ingredients" => [
                    "pasta",
                    "tonno",
                    "olio",
                    "sale",
                ]
            ],
            [
                "name" => "carne di cinghiale",
                "description" => "ben cotta.",
                "image" => "https://cdn.cook.stbm.it/thumbnails/ricette/1/1650/hd750x421.jpg",
                "price" => 25.00,
                "available" => false,
                "course" => "secondo piatto",
                "ingredients" => [
                    "carne di cinghiale",
                    "olio",
                    "paprika",
                    "sale",
                ]
            ],
            [
                "name" => "Ravioli al Ragù ",
                "description" => "Deliziosi ravioli fatti in casa con un ragù gustoso di carne, arricchito con erbe aromatiche.",
                "image" => "https://blog.giallozafferano.it/profumodizafferano/wp-content/uploads/2020/03/ravioli-scaled.jpg",
                "price" => 30.00,
                "available" => true,
                "course" => "primo piatto",
                "ingredients" => [
                    "pasta per ravioli",
                    "carne",
                    "rosmarino",
                    "timo",
                    "sale",
                ],
            ],
            [
                "name" => "Spezzatino con Polenta",
                "description" => "Uno spezzatino succulento di carne servito con una morbida polenta.",
                "image" => "https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/09f0c048233eda616ecf493239fa7306/Derivates/1f95890f050fe206c54ff3ca4803463439842134.jpg",
                "price" => 28.00,
                "available" => false,
                "course" => "secondo piatto",
                "ingredients" => [
                    "carne",
                    "pollo per lo spezzatino",
                    "polenta",
                    "carote",
                    "sedano",
                ],
            ],
            [
                "name" => "Burger di Maiale",
                "description" => "Burger originali con carne di maiale condita con spezie e erbe aromatiche.",
                "image" => "https://assets.bonappetit.com/photos/5b919cb83d923e31d08fed17/1:1/w_2560%2Cc_limit/basically-burger-1.jpg",
                "price" => 20.00,
                "available" => true,
                "course" => "secondo piatto",
                "ingredients" => [
                    "carne di maiale macinata",
                    "formaggio",
                    "insalata",
                    "pomodoro",
                    "pane per hamburger",
                ],
            ],
        ];

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->restaurant_id = rand(1, $restaurants);
            $new_dish->name = $dish["name"];
            $new_dish->description = $dish["description"];
            $new_dish->image = $dish["image"];
            $new_dish->price = $dish["price"];
            $new_dish->available = $dish["available"];
            $new_dish->course = $dish["course"];
            $new_dish->ingredients = implode(",", $dish["ingredients"]);
            $new_dish->slug = Str::slug($new_dish->name, '-');
            $new_dish->save();
        }
    }
}