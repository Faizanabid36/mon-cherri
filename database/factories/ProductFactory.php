<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => 'product-'.rand(),
        'price' => rand(1000,10000),
        'brand_id' => rand(1,3),
        'description'=> $faker->sentence
    ];
});
