<?php

use Faker\Generator as Faker;
use App\Promotion;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        //
        'name' => substr($faker->sentence(3),0,-1), 
        'description' => $faker->sentence(10), 
        'long_description' => $faker->text, 
        'price' => $faker->randomFloat(2,150,1200)
    ];
});
