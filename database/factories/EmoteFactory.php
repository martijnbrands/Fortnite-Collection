<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Emote::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'rarity' => $faker->randomElement(["common", "uncommon", "rare", "epic", "legendary"]),
        'vbucks' => $faker->randomElement(["200", "500", "1000", "1500", "2000"]),
        'thumbnail' => "floss.png",
        'video' => "not_availabile"
    ];
});