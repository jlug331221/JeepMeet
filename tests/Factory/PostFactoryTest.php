<?php

namespace Tests\Factory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Forum_Models\Post;
use App\Forum_Models\Thread;

use App\User_Models\User;

class PostFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a post factory.
     *
     * @return void
     */
    public function testPostFactory()
    {
        $user = factory(User::class)->create();

        $thread = factory(Thread::class)->create([
            'user_id' => $user->id
        ]);

        $post = factory(Post::class)->create([
            'user_id' => $user->id,
            'thread_id' => $thread->id
        ]);

        $this->assertDatabaseHas('posts', [
            'user_id' => $user->id,
            'thread_id' => $thread->id,
            'title' => $post->title,
            'content' => $post->content
        ]);

        $post->delete();

        $this->assertDatabaseMissing('posts', [
            'user_id' => $user->id,
            'thread_id' => $thread->id,
            'title' => $post->title,
            'content' => $post->content
        ]);
    }
}
