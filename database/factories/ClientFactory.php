<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Client;
use Illuminate\Support\Str;
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

$factory->define(Client::class, function (Faker $faker) {
    $status = ['active', 'inactive', 'suspended'];
    return [
        'salutation' => $faker->title,
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone_no' => $faker->tollFreePhoneNumber,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'status' => $status[rand(0, 2)],
    ];
});
