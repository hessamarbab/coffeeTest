<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Choice;
use App\Option;
use Faker\Generator as Faker;

$optionCount = Option::count();

$factory->define(Choice::class, function (Faker $faker)use($optionCount) {
    return [
        'name' => $faker->word(),
        'option_id' => $faker->numberBetween(1,$optionCount)
    ];
});
