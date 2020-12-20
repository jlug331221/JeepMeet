<?php

use App\Forum_Models\Thread;
use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Seed thread to the database.
     *
     * @return void
     */
    public function run()
    {
        factory(Thread::class, 8)->create();
    }
}
