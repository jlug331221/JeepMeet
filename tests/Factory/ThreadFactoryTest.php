<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Forum_Models\Thread;
use App\User_Models\User;

class ThreadFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test a thread factory.
     *
     * @return void
     */
    public function testThreadFactory()
    {
        $user = factory(User::class)->create();

        $thread = factory(Thread::class)->create([
            'user_id' => $user->id
        ]);

        $this->assertDatabaseHas('threads', [
            'user_id' => $user->id,
            'title' => $thread->title
        ]);

        $thread->delete();

        $this->assertDatabaseMissing('threads', [
            'user_id' => $user->id,
            'title' => $thread->title
        ]);
    }
}