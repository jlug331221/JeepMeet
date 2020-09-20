<?php

use App\User;
use App\Forum_Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
  /**
   * Seed dummy posts to database.
   *
   * @return void
   */
  public function run()
  {
    factory(Comment::class, 100)->create()->each(function ($comment) {
      $this->insertTwoCommentReplies($comment);
    });
  }

  /**
   * Inser two sub comments
   */
  private function insertTwoCommentReplies($comment)
  {
    $faker = Faker::create();

    for ($i = 0; $i < 2; $i++) {
      DB::table('comments')->insert([
        'user_id' => User::all()->random()->id,
        'post_id' => $comment->post_id,
        'comment' => $faker->sentences(3, true),
        'parent_id' => $comment->id,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
