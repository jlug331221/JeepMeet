<?php

namespace Tests\Factory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Forum_Models\Comment;
use App\Forum_Models\Post;
use App\Forum_Models\Thread;
use App\User_Models\User;

class CommentFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a comment factory.
     *
     * @return void
     */
    public function testCommentFactory()
    {
        $user = factory(User::class)->create();

        $thread = factory(Thread::class)->create([
            'user_id' => $user->id
        ]);

        $post = factory(Post::class)->create([
            'user_id' => $user->id,
            'thread_id' => $thread->id
        ]);

        $comment = factory(Comment::class)->create([
            'user_id' => $user->id,
            'post_id' => $post->id
        ]);

        $this->assertDatabaseHas('comments', [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'user_comment' => $comment->user_comment
        ]);

        $comment->delete();

        $this->assertDatabaseMissing('comments', [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'user_comment' => $comment->user_comment
        ]);
    }
}
