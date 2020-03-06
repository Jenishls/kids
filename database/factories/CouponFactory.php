<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
	$enum=['flat','percentage'];
    return [
	    'code' => $faker->isbn10,
	    'name' => $faker->name,
	    'description' => $faker->paragraph,
	    'usage' => $faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
	    'start_date' =>  date('y-m-d H:i:s', strtotime('1 year ago')),
	    'end_date' =>  date('y-m-d H:i:s', strtotime('1 year ago')),
	    'value' => $faker->randomNumber(2),
	    'type' => array_random($enum),
	    'min_price'=>$faker->randomNumber(2),
    ];
});
