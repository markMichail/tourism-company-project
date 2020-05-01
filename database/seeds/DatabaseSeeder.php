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
      factory('App\Customer', 5)->create();
      factory('App\Destination', 5)->create();
      factory('App\Safe', 1)->create();
      factory('App\Receipt', 10)->create();
    }
}
