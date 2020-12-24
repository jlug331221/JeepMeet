<?php

namespace App\Http\Controllers\API\Forum;

use App\Forum_Models\Thread;
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
     * @param  \App\Forum_Models\Thread  $thread
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
     * @param  \App\Forum_Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified thread from storage.
     *
     * @param  \App\Forum_Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
