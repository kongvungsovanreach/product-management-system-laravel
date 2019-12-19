<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        "name" =>$faker->firstNameMale,
        "description"=>$faker->sentence,
        "price"=>$faker->numberBetween($min = 200, $max = 1000),
        "thumbnail"=>str_replace("storage/app/public/", "", $faker->image($dir = 'storage/app/public/upload', $width = 400, $height = 400,"cats"))
    ];
});
