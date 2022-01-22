<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;

use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return Inertia::render('Auth/Register', [
            'csrf_token' => csrf_token(),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createNewUser(array $data)
    {
        return User::create([
            'first_name'              => $data['first_name'],
            'last_name'               => $data['last_name'],
            'username'                => $data['username'],
            'email'                   => $data['email'],
            'password'                => Hash::make($data['password']),
            'location_country'        => $data['location_country'],
            'location_state_province' => $data['location_state_province']
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'       => ['required', 'string', 'max:50'],
            'last_name'        => ['required', 'string', 'max:50'],
            'username'         => ['required', 'string', 'max:50', 'unique:users'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', 'confirmed', Rules\Password::defaults()],
            'location_country' => ['required', 'string']
        ]);

        $user = $this->createNewUser($request->all());

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home');
    }
}
