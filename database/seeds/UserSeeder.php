<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Seed users to the database.
   *
   * @return void
   */
  public function run()
  {
    factory(User::class, 15)->create();
  }
}
