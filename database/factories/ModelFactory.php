<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
    'category_id'=>$faker->numberBetween(17,81),
    'code'=>$faker->word,
    'name'=> $faker->name,
    'material'=> $faker->word,
    'color'=> $faker->colorName,
    'width'=>$faker->randomFloat(0, 100, 2000) ,
    'depth'=>$faker->randomFloat(0, 100, 2000) ,
    'description'=>$faker->sentences(3,true),
    'price'=>$faker->randomFloat(2, 10, 2000),
    'special_price'=>$faker->randomFloat(2, 10, 2000)
    ];
});
