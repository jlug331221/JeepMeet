<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Display the registration view.
     *
     * @return Inertia
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'       => ['required', 'string', 'max:50'],
            'last_name'        => ['required', 'string', 'max:50'],
            'username'         => ['required', 'string', 'max:50', 'unique:users'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
            'location_country' => ['required', 'string']
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
     * Handle a registration request for the application. We are overriding the
     * Laravel 'register' method in the RegistersUsers trait.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->createNewUser($request->all());

        event(new Registered($user));

        Auth::login($user);

        return redirect('/register')->with('success', 'You are now registered! A link has ' .
            'been sent to you to verify your email.');
    }
}
