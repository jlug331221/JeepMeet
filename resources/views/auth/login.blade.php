@extends('layouts.app_master')

@section('title', 'Login')

@section('main-content')

<div class="columns is-mobile is-centered">
  <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
    <section class="section is-medium has-text-left whitesmoke-section login-box">
      <h2 class="title is-2">Login</h2>
      
      <form action="">
        <div class="field">
          <div class="control has-icons-left">
            <input type="text" class="input" placeholder="Username">
            
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>

        <div class="field">
          <div class="control has-icons-left">
            <input type="password" class="input" placeholder="Password">
            
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </div>
        </div>

        <div class="field">
          <div class="control">
            <label class="checkbox login-checkbox">
                <input type="checkbox">
                Keep Me Logged In
            </label>
          </div>
        </div>

        <div class="field">
          <a class="has-text-left" href="#">Forgot Credentials</a>
        </div>

        <div class="field">
          <div class="control">
            <button class="button button-filled is-rounded">Submit</button>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>

@endsection