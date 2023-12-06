<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{

    public function run()
    {
        $restaurants = [
            [
                "name" => 'Trattoria da Mario',
                'address' => 'Via dei Mille, 78',
                'description' => 'Il nostro ristorante è molto bello, siediti a mangia roba buona',
                'image' => 'https://www.ristoranteallalega.com/photos/ristorante.jpg',
            ],
            [
                "name" => 'La Pizzeria del Sole',
                'address' => 'Via Roma, 10',
                'description' => 'Autentica pizza napoletana cotta a legna e piatti tradizionali italiani.',
                'image' => 'https://www.borgobrufa.it/wp-content/uploads/sites/495/2023/04/Ristorante-Quattro-Sensi-2.jpg',
            ],
            [
                "name" => 'Osteria da Maria',
                'address' => 'Piazza Dante, 5',
                'description' => 'Ambiente accogliente con cucina tipica toscana e vini locali.',
                'image' => 'https://ristorantemaestrale.com/wp-content/uploads/2019/10/locale.jpg',
            ],
            [
                "name" => 'Ristorante del Mare',
                'address' => 'Lungomare Colombo, 25',
                'description' => 'Specialità di pesce fresco e vista mozzafiato sul mare.',
                'image' => 'https://media-assets.lacucinaitaliana.it/photos/61fb0393f9bff304ce3ec288/16:9/w_2560%2Cc_limit/Il-meglio-del-lago-di-Orta.jpg',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->slug = Str::slug($new_restaurant->name, '-');
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->description = $restaurant['description'];
            $new_restaurant->image = $restaurant['image'];
            $new_restaurant->save();
        }
    }
}