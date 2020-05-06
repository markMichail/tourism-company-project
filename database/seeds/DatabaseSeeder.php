<?php

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // Static Users
    DB::table('users')->insert(array(
      array(
        'name' => "fady",
        'email' => "fady@gmail.com",
        'username' => 'fady',
        'phone' => '01065721222',
        'privilege' => '1',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
      ),
      array(
        'name' => "mark",
        'email' => "mark@m.com",
        'username' => 'mark',
        'phone' => '01065721224',
        'privilege' => '2',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
      ),
      array(
        'name' => "ahmed",
        'email' => "ahmed@a.com",
        'username' => 'ahmed',
        'phone' => '01065721223',
        'privilege' => '3',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
      ),
    ));

    DB::table('customers')->insert(array(
      array(
        'name' => 'CashCustomer',
        'phone' => '0000000000',
        'email' => 'CashCustomer@cashcustomer.com',
        'note' => "",
        'totalcredit' => 0,
      )
    ));

    factory('App\Customer', 5)->create();
    factory('App\Destination', 4)->create();
    factory('App\Order', 30)->create();
    factory('App\Safe', 1)->create();
    factory('App\Ticket', 100)->create()->each(function ($ticket) {
      if ($ticket->type == "refunded") {
        factory('App\RefundedTicket')->create([
          'ticket_id' => $ticket->id,
        ]);
        $order = DB::table("orders")->where('id', $ticket->order_id)->get();
        factory('App\Receipt')->states('refundedreceipt')->create([
          'receiptable_id' => $order[0]->customer_id,
          'receiptable_type' => "App\Customer",
          'type' => "expense",
          'description' => "Tickets Refund",
          'total_amount' => $ticket->sellprice,
        ]);
      }
    });

    factory('App\Receipt', 20)->state('destinationreceipt')->create();


    DB::table('roles')->insert(array(
      array(
        'name' => 'superadmin',
        'description' => 'A user with super admin privilege.',
      ),
      array(
        'name' => 'admin',
        'description' => 'A user with admin privilege.',
      ),
      array(
        'name' => 'helpdesk',
        'description' => 'A user with help desk privilege.',
      ),
    ));
    
    DB::table('role_user')->insert(array(
      array(
        'role_id' => '1',
        'user_id' => '1',
      ),
      array(
        'role_id' => '2',
        'user_id' => '2',
      ),
      array(
        'role_id' => '3',
        'user_id' => '3',
      ),
    ));

    DB::table('settings')->insert(array(
      array(
        'label' => 'Report Period  (In Days)',
        'value' => '15',
        'type' => "number",
        'name' => "reportPeriod",
      ),

      array(
        'label' => 'Late Payment  (In Days)',
        'value' => '15',
        'type' => "number",
        'name' => "latePeriod",
      ),
    ));
  }
}
