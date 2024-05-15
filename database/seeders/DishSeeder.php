<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            [
                'title' => 'Boiled pea soup',
                'recipe_link' => 'https://www.unian.ua/recipes/first-courses/dishes-meat/vkusneyshiy-gorohovyy-sup-recept-na-veka-12331182.html'
            ],
            [
                'title' => 'The most delicate cabbage rolls from Chinese cabbage',
                'recipe_link' => 'https://www.unian.ua/recipes/first-courses/dishes-meat/smachni-golubci-z-pekinskoji-kapusti-naykrashchiy-recept-12232308.html'
            ],
            [
                'title' => 'Cold and hot borscht',
                'recipe_link' => 'https://www.unian.ua/recipes/first-courses/dishes-meat/yak-prigotuvati-holodnik-perevireni-poradi-pershogo-blyuda-11556535.html'
            ],
            [
                'title' => 'Hearty Greek moussaka',
                'recipe_link' => 'https://www.unian.ua/recipes/second-courses/casserole/musaka-klassicheskiy-recept-s-baklazhanami-12583983.html'
            ],
            [
                'title' => 'Flavorful and tender fish cakes',
                'recipe_link' => 'https://www.unian.ua/recipes/second-courses/fish-and-mushroom-dishes/sochnye-rybnye-kotlety-iz-konservy-proverennye-recepty-12553338.html'
            ],
            [
                'title' => 'Healthy okroshka',
                'recipe_link' => 'https://www.unian.ua/recipes/first-courses/cold-soups/diyetichna-okroshka-recept-dlya-tih-hto-hudne-12275808.html'
            ],
            [
                'title' => 'Delicious salad "New Year\'s Dragon"',
                'recipe_link' => 'https://www.unian.ua/recipes/holiday-menus/supervkusnyy-novogodniy-salat-drakon-elementarnyy-recept-12463344.html'
            ],
            [
                'title' => 'Roll "Herring under a fur coat',
                'recipe_link' => 'https://www.unian.ua/recipes/salads/salads-with-fish-and-seafood/seledka-pod-shuboy-rulet-vkusnyy-recept-12474897.html'
            ],
            [
                'title' => 'Salad "Chicken high"',
                'recipe_link' => 'https://www.unian.ua/recipes/salads/salads-with-meat/kurica-pod-kayfom-recept-salata-s-makom-12454911.html'
            ],
            [
                'title' => 'Dutch pancakes that don\'t need to be fried',
                'recipe_link' => 'https://www.unian.ua/recipes/desserts/other-pastries/mlinci-na-moloci-za-5-hvilin-recepti-na-maslyanu-12571371.html'
            ],
            [
                'title' => 'Wafer cake with condensed milk',
                'recipe_link' => 'https://www.unian.ua/recipes/desserts/various-sweets/vkusneyshiy-vafelnyy-tort-so-sgushchenkoy-recept-iz-90-h-12575571.html'
            ],
            [
                'title' => 'Homemade Kyiv cake',
                'recipe_link' => 'https://www.unian.ua/recipes/desserts/cakes/kievskiy-tort-recept-domashniy-poshagovo-12570054.html'
            ],
        ];

        Dish::upsert($dishes, uniqueBy: ['title'], update: ['title', 'recipe_link']);
    }
}
