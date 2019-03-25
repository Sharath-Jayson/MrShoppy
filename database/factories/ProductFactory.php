<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'price' => $faker->numberBetween(1000,10000),
        'image' => 'products/asus_zen.png',
        'description' => $faker->paragraph(3),
    ];
});
