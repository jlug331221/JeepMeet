<?php

namespace App\Http\Controllers\API\Forum;

use App\Models\Thread;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the threads.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Thread::all();
    }

    /**
     * Get all of the posts for a single thread with $id.
     * 
     * @param  int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getPostsForThread($id) {
        return Thread::find($id)->posts;
    }

    /**
     * Store a newly created thread in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified thread.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Update the specified thread in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified thread from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
