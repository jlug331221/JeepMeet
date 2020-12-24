<?php

namespace Database\Seeders;

use App\Models\Thread;
use Illuminate\Database\Seeder;

class ForumThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thread::factory(8)->create();
    }
}
