<?php

use Illuminate\Database\Seeder;

class ForumDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User_Models\User::class, 10)->create()->each(function ($u) {
            $u->threads()->save(factory(App\Forum_Models\Thread::class)->make());
        });
    }
}
