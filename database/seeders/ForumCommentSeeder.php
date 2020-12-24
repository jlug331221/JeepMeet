<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory(100)->create()->each(function ($comment) {
            $this->insertTwoCommentReplies($comment);
        });
    }

    /**
     * Insert two sub comments for $comment.
     */
    private function insertTwoCommentReplies($comment)
    {
        $this->faker = Faker::create();

        for ($i = 0; $i < 2; $i++) {
            DB::table('comments')->insert([
                'user_id' => User::all()->random()->id,
                'post_id' => $comment->post_id,
                'comment' => $this->faker->sentences(3, true),
                'parent_id' => $comment->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
