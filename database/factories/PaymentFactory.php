<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
       'order_id' => function(array $order) use($faker){
       		$order= Order::create([
       			'order_no'=> $faker->randomNumber,
       			'client_id' => 1,
       			'company_id' => $faker->numberBetween($min= 1, $max = 5),
       			'billing_addr_id' => 1,
       			'shipping_addr_id' => 2,
       			'delivery_addr_id' => 3,
       			'delivery_date' => date('y-m-d H:i:s', strtotime('after 5 days ')),
       			'delivery_time' => $faker->time($format = 'H:i:s', $max = 'now'),
       			'delivery_note' => $faker->paragraph,
       			'pickup_date' =>  date('y-m-d H:i:s', strtotime('after 6 days')),
       			'pickup_time' => $faker->time($format = 'H:i:s', $max='now'),
       			'pickup_note' => $faker->paragraph,
       			'prefer_method_of_contact' => 'Call',
       			'order_status' => 'pending',
       		]);
       		OrderDetail::create([
       			'order_id' =>$order->id,
       			'i_agree' => 1,
       			'original_url' => $faker->url,
       		]);
       		return $order->id;
       },
		'payment_type' => 'card',
		'gateway' => $faker->creditCardType,
		'cr_last4'=> $faker->numberBetween($min=1111, $max= 9999),
		'cr_exp_year' => date('y', strtotime('after 1 year')),
		'cr_exp_month' => $faker->numberBetween($min=1, $max=12),
		'transaction_id' => $faker->randomNumber($nbDigits = NULL, $strict = false),
		'card_last_name' => $faker->lastName,
		'billing_zip_code' => $faker->postcode,
		'amount' => $faker->numberBetween($min= 20, $max= 2000),
		'ref_no' => $faker->randomNumber,
		'description' => $faker->paragraph,
		'is_active' => 1,
		'userc_id' => 1
    ];
});
