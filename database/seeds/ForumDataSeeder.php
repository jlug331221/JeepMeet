<?php

use App\User_Models\User;
use App\Forum_Models\Post;
use App\Forum_Models\Thread;

use Illuminate\Database\Seeder;

class ForumDataSeeder extends Seeder
{   
    /**
     * Run the forum database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create_users();

        $this->create_threads();

        $this->create_posts();
    }

    /**
     * Create ten users for forum database seeding.
     * 
     * @return void
     */
    public function create_users()
    {
        factory(User::class, 10)->create();
    }

    /**
     * Each user will create a thread.
     * 
     * @return void
     */
    public function create_threads()
    {
        $users = User::all();

        foreach ($users as $u) {
            $u->threads()->save(factory(Thread::class)->make());
        }
    }

    /**
     * Create three posts for each thread.
     * 
     * @return void
     */
    public function create_posts()
    {
        $threads = Thread::all();

        foreach ($threads as $t) {
            $posts = factory(Post::class, 3)->create([
                'thread_id' => $t->id,
                'user_id'   => $t->user_id
            ]);

            foreach ($posts as $p) {
                $p->save();
            }
        }
    }
}
