<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ShowAboutController extends Controller
{
    /**
     * Show the user to the About page.
     *
     * @return Inertia
     */
    public function __invoke()
    {
        return Inertia::render('About');
    }
}
