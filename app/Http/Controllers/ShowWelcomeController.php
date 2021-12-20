<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ShowWelcomeController extends Controller
{
    /**
     * Show the user to the Welcome page.
     *
     * @return Inertia
     */
    public function __invoke()
    {
        return Inertia::render('Welcome');
    }
}
