<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Destination;
use App\User;
use App\Safe;
use App\Receipt;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => "fady",
        'email' => "fady@f.com",
        'username' => 'fady',
        'phone' => '01065721222',
        'privilege' => '1',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Destination::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['sbaka', 'kahraba', 'negara', 'transportation']),
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['mark', 'ahmed', 'emad', 'abdehameed', 'mohammed']),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'note' => $faker->paragraph(),
        'totalcredit' => $faker->randomElement([-5000, 0, 1500, 1000, 0, 0]),
    ];
});

$factory->define(Safe::class, function (Faker $faker) {
    return [
        'safe_id' => '0',
        'total' => $faker->numberBetween(1500, 6000),
        'status' => '1',
        'date' => $faker->date,
    ];
});

$factory->define(Receipt::class, function (Faker $faker) {
    $customerid = Customer::all()->random()->id;
    $destinationid = Destination::all()->random()->id;

    $receiptable_id = $faker->randomElement([$customerid, $destinationid]);
    $receiptable_type = $receiptable_id == $customerid ? 'App\Customer' : 'App\Destination';

    return [
        'receiptable_id' => $receiptable_id,
        'receiptable_type' => $receiptable_type,
        'safe_id' => '0',
        'employee_id' => '1',
        'type' => 'expense',
        'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'total_amount' => $faker->numberBetween(500, 4000),
        'receipt_date' => $faker->date
    ];
});
