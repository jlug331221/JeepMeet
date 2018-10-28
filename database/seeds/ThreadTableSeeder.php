<?php

use Illuminate\Database\Seeder;

use App\Forum_Models\Thread;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Thread::class, 10)->create();
    }
}
