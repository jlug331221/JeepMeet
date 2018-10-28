<?php

use Illuminate\Database\Seeder;

use App\Forum_Models\Notification;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Notification::class, 10)->create();
    }
}
