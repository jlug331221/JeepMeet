@extends('layouts.app_master')

@section('title', 'Verfiy Email')

@section('main-content')

<section class="section is-medium">
  <div class="columns is-centered">
    <div class="column is-full-mobile is-three-fifths-tablet is-three-fifths-desktop 
      is-half-widescreen">
      <div class="card">
        <header  class="card-header">
          <p class="card-header-title">{{ __('Verify Your Email Address') }}</p>
        </header>

        <div class="card-content">
          <div class="content">
            @if (session('resent'))
              <div class="notification is-info is-light" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
              </div>
            @endif

            {{ __('Before proceeding to your profile, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button style="margin-top: 1rem;" type="submit" class="button is-link is-light">
                {{ __('Click here to request another') }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
