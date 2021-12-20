<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ShowForumController extends Controller
{
    /**
     * Show the user to the Main Forum page.
     *
     * @return Inertia
     */
    public function __invoke()
    {
        return Inertia::render('Forum/ForumIndex');
    }
}
