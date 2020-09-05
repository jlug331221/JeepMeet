<?php

use App\Forum_Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  /**
   * Seed dummy posts to database.
   *
   * @return void
   */
  public function run()
  {
    factory(Post::class, 50)->create();
  }
}
