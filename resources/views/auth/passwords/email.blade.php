@extends('layouts.app_master')

@section('title', 'Password Reset Email')

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
          <div class="content">
            @if (session('status'))
              <div class="notification is-info is-light" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="field">
                <label for="email" class="label">
                  {{ __('E-Mail Address') }}
                </label>

                <div class="control">
                  <input id="email" type="email" class="input @error('email') 
                    is-danger @enderror" name="email" value="{{ old('email') }}" 
                    required autocomplete="email" autofocus>
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <button type="submit" class="button is-primary is-light">
                    {{ __('Send Password Reset Link') }}
                  </button>
                </div>
              </div>

              @error('email')
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
</div>

@endsection
