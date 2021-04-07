<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Option;
use App\Product;
use Faker\Generator as Faker;

$optionCount = Option::count();
$factory->define(Product::class, function (Faker $faker) use($optionCount){

    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

    return [
        'name' => $faker->beverageName(),
        'cost' => $faker->numberBetween(1,20),
        'option_id' => $faker->numberBetween(1,$optionCount)
    ];
});
