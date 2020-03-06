<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\Account;
use App\Model\Company;
use App\Model\Address;
use App\Model\Contact;
use App\Model\Location;
use App\Model\AccountAddress;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
    	'account_id' => function(array $account) use($faker){
			$company =Company::create([
                'c_name' => $faker->name,
                'url' => $faker->url,
                'start_date' => date('y-m-d H:i:s', strtotime('1 year ago')),
                'status' => 'active',
                'company_desc' => $faker->paragraph,
                'industry' => $faker->word,
                'reg_no' => str_replace('-', '', $faker->phoneNumber),
            ]);
            $account = Account::create([
            	'company_name' => $faker->name,
            	'estd_date' => date('y-m-d H:i:s', strtotime('1 year ago')),
            	'ownership' => $faker->word,
            	'account_code' => $faker->postcode,
            	'industry' => $faker->word,
            	'short_desc' => $faker->paragraph,
            	'url' => $faker->url,
            	'reference' => $faker->url,
            	'credit_terms' => $faker->word,
            	'is_active' => 0,
            	'userc_id' => 1
            ]);
            $address = Address::create([
                'table' => 'companies',
                'table_id' => $company->id,
                'add1' => $faker->address,
                'add2' => $faker->address,
                'city' => $faker->city,
                'county' => $faker->stateAbbr,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'country' => $faker->country,
                'is_default' => 1
            ]);
            $contact = Contact::create([
                'table' => 'companies',
                'fname' => $faker->firstName(),
                'mname' => '',
                'lname' => $faker->lastName(),
                'table_id' => $company->id,
                'mobile_no' => str_replace('-', '', $faker->phoneNumber),
                'phone_no' => str_replace('-', '', $faker->phoneNumber),
                'email' => $faker->freeEmail,
                'is_default' => 1
            ]);
            $accountAddress= AccountAddress::create([
		        'account_id' => $account->id,
		        'address_id' => $address->id,
		        'contact_id' => $contact->id,
		        'is_default' => 1
		    ]);
    	},
        'address_id' => 1,
        'contact_id' => 1,
    ];
});
