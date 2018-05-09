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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'description' => $faker->paragraph,
        'img' => 'none'
    ];
});

$factory->define(App\SubCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'category_id' => $faker->numberBetween(1, 6),
        'description' => $faker->paragraph,
        'img' => 'none'
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words(5, true),
        'sub_category_id' => $faker->numberBetween(1, 50),
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(10, 1000),
        'quantity' => $faker->numberBetween(0, 1000)
    ];
});

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'title' => $faker->words(5, true),
        'comment' => $faker->paragraph,
        'rating' => $faker->numberBetween(1, 5),
        'product_id' => $faker->numberBetween(1, 500),
        'user_id' => $faker->numberBetween(1, 50),
    ];
});
