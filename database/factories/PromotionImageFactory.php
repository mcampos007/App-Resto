<?php

use Faker\Generator as Faker;
use App\PromotionImage;

$factory->define(PromotionImage::class, function (Faker $faker) {
    return [
        //
        'image'=> $faker->imageUrl(250,250),
    	'promotion_id' => $faker->numberBetween(1,3)
    ];
});
