<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        //
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email' => $faker->email ,
        'contactnumber' => $faker->phoneNumber,
        'user_id' => 1 
    ];
});
