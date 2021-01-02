<?php

namespace App\Http\Controllers\API\Forum;

use App\Models\Post;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Get all posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Get all posts within the previous 3 months (including days up to 4 months).
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recentPosts()
    {
        return Post::withCount('comments')
                ->with(['user', 'thread'])
                ->whereBetween('created_at', [Carbon::now()->subMonth(3), Carbon::now()])
                ->orderBy('created_at', 'DESC')
                ->get();
    }

    /**
     * Get all of the posts for a thread with $id.
     * 
     * @param  int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function postsForThread($id) {
        return Post::withCount('comments')
                ->with(['user'])
                ->where('thread_id', $id)
                ->orderBy('created_at', 'DESC')
                ->get();
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
