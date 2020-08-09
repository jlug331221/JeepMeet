@extends('layouts.app_master')

@section('title', 'Reset Password')

@section('main-content')

<div class="section is-medium">
  <div class="columns is-centered">
    <div class="column is-full-mobile is-three-fifths-tablet is-three-fifths-desktop 
      is-half-widescreen">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">{{ __('Reset Password') }}</p>
        </header>

        <div class="card-content">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field">
              <label for="email" class="label">
                {{ __('E-Mail Address') }}
              </label>

              <div class="control">
                <input id="email" type="email" class="input @error('email') 
                is-danger @enderror" name="email" value="{{ $email ?? old('email') }}" 
                required autocomplete="email" autofocus>
              </div>
            </div>

            <div class="field">
              <label for="password" class="label">
                {{ __('Password') }}
              </label>

              <div class="control">
                <input id="password" type="password" class="input @error('password') 
                  is-danger @enderror" name="password" required autocomplete="new-password">
              </div>
            </div>

            <div class="field">
              <label for="password-confirm" class="label">
                {{ __('Confirm Password') }}
              </label>

              <div class="control">
                <input id="password-confirm" type="password" class="input" 
                  name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>

            <div class="field">
              <div class="control">
                <button type="submit" class="button is-primary is-light">
                  {{ __('Reset Password') }}
                </button>
              </div>
            </div>

            @error('email')
              <div class="notification is-danger is-light" role="alert">
                <strong>{{ $message }}</strong>
              </div>
            @enderror

            @error('password')
              <div class="notification is-danger is-light" role="alert">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
