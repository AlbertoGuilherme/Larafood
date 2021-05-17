<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
       'name' =>$faker->unique()->word,
       'description' =>$faker->sentence(),
       'price' => 12.3,
    ];
});
