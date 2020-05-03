<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      factory('App\User', 1)->create();
      DB::table('users')->insert(array(
        array(
          'name' => "ahmed",
          'email' => "ahmed@a.com",
          'username'=>'ahmed',
          'phone'=>'01065721223',
          'privilege'=>'3',
          'email_verified_at' => now(),
          'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
          'remember_token' => Str::random(10),
        ),
        array(
          'name' => "mark",
          'email' => "mark@m.com",
          'username'=>'mark',
          'phone'=>'01065721224',
          'privilege'=>'2',
          'email_verified_at' => now(),
          'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
          'remember_token' => Str::random(10),
        ),
      ));
      factory('App\Customer', 5)->create();
      factory('App\Destination', 5)->create();
      factory('App\Safe', 1)->create();
      factory('App\Receipt', 10)->create();
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
          'role_id' => '3',
          'user_id' => '2',
        ),
        array(
          'role_id' => '2',
          'user_id' => '3',
        ),
      ));
    }
}
