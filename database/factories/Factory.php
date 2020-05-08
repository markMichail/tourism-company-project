<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Destination;
use App\Order;
use App\User;
use App\Safe;
use App\Receipt;
use App\RefundedTicket;
use App\Ticket;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

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

$factory->define(Destination::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['sbaka', 'kahraba', 'negara', 'transportation']),
        'phone' => '01' . $faker->randomNumber($nbDigits = 9),
    ];
});

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Abanoub', 'Islam', 'Ali', 'Emad', 'Abdehameed', 'Mohammed']),
        'phone' => '01' . $faker->randomNumber($nbDigits = 9),
        'email' => $faker->email,
        'note' => $faker->paragraph(),
        'totalcredit' => $faker->randomElement([-5000, 0, 1500, 1000, 0, 0]),
    ];
});

$factory->define(Order::class, function (Faker $faker) {
    $customerid = Customer::all()->random()->id;
    $employeeid = User::all()->random()->id;
    $status = $customerid == 1 ? 1 : 0;

    return [
        'customer_id' => $customerid,
        'date' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
        'employee_id' => $employeeid,
        'status' => $status,
    ];
});

$autoIncrement = autoIncrement(1000000, 1000100);

$factory->define(Ticket::class, function (Faker $faker) use ($autoIncrement) {
    $autoIncrement->next();
    $orderid = Order::all()->random()->id;
    $rsoom = $faker->numberBetween($min = 500, $max = 2000);
    $assay = $faker->numberBetween($min = 500, $max = 2000);
    $total = $rsoom + $assay;
    $sellprice = $total - $faker->numberBetween($min = 0, $max = 500);
    $type = $faker->randomElement(['void', 'credit', 'ticket']);

    return [
        'ticketNumber' => $autoIncrement->current(),
        'type' => $type,
        'passengerName' => $faker->name(),
        'destination' => $faker->city(),
        'transportationCompany' => $faker->randomElement(['British Airways', 'China Airlines', 'Singapore Airlines Cargo', 'Lufthansa', 'Korean Air Cargo', 'Cathay Pacific Airlines', 'Cairo Airlines']),
        'rsoom' => $rsoom,
        'percentageAsasy' => $faker->randomElement([5, 10, 15]),
        'asasy' => $assay,
        'total' => $total,
        'comission' => $faker->numberBetween($min = 500, $max = 2000),
        'comissionTax' => $faker->numberBetween($min = 500, $max = 2000),
        'bsp' => $faker->numberBetween($min = 100, $max = 200),
        'sellprice' => $sellprice,
        'profit' => $total - $sellprice,
        'safy' => $faker->numberBetween($min = 2000, $max = 5000),
        'paymentType' => $faker->randomElement(['visa', 'cash', 'check']),
        'order_id' => $orderid,
    ];
});

function autoIncrement($from, $to)
{
    for ($i = $from; $i <= $to; $i++) {
        yield $i;
    }
}

$factory->define(RefundedTicket::class, function (Faker $faker) {
    return [
        'refund_date' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
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



$factory->state(Receipt::class, 'refundedreceipt', function (Faker $faker) {
    $employeeid = User::all()->random()->id;
    return [
        'safe_id' => '0',
        'employee_id' => $employeeid,
        'receipt_date' => $faker->date,
    ];
});

$factory->state(Receipt::class, 'payreceipt', function (Faker $faker) {
    $customerid = Customer::all()->unique()->random()->id;
    $order = Order::where('customer_id', $customerid)->inRandomOrder()->limit(1)->get();
    $ticket = Ticket::where('order_id', $order[0]->id)->where('type', '<>', 'refunded')->inRandomOrder()->limit(1)->get();
    $amount = $ticket[0]->sellprice;
    return [
        'receiptable_id' => $customerid,
        'total_amount' => $amount,
    ];
});

$factory->state(Receipt::class, 'destinationreceipt', function (Faker $faker) {
    $destinationid = Destination::all()->random()->id;
    return [
        'receiptable_id' => $destinationid,
        'receiptable_type' => "App\Destination",
    ];
});

$factory->define(Receipt::class, function (Faker $faker) {
    $customerid = Customer::all()->random()->id;
    $destinationid = Destination::all()->random()->id;

    $receiptable_id = $faker->randomElement([$customerid, $destinationid]);
    $receiptable_type = $receiptable_id == $customerid ? 'App\Customer' : 'App\Destination';
    $employeeid = User::all()->random()->id;

    return [
        'receiptable_id' => $receiptable_id,
        'receiptable_type' => $receiptable_type,
        'safe_id' => '0',
        'employee_id' => $employeeid,
        'type' => "expense",
        'description' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'total_amount' => $faker->numberBetween(500, 4000),
        'receipt_date' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
    ];
});
