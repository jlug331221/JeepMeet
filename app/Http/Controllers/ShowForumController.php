<?php

namespace App\Http\Controllers;

class ShowForumController extends Controller
{
    /**
     * Show the user to the Main Forum page.
     *
     * @return View
     */
    public function __invoke()
    {
        return view('forum');
    }
}
