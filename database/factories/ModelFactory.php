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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->sentence,
		'slug' => str_slug($faker->sentence),
		'preview_text' => $faker->text(100),
		'preview_img' => $faker->imageUrl(),
		'detail_text' => $faker->text,
		'detail_img' => $faker->imageUrl(1440, 900),
		'views' => $faker->numberBetween(10, 500),
	];
});