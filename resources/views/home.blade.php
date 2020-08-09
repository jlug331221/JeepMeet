@extends('layouts.app_master')

@section('title', 'Profile')

@section('main-content')

<section class="section is-medium">
  <div class="columns is-centered">
    <div class="column is-full-mobile is-three-fifths-tablet is-three-fifths-desktop 
      is-half-widescreen">
      @if (session('status'))
        <div class="notification is-link is-light" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <h1 class="title">You are logged in and verified!!</h1>
    </div>
  </div>
</section>

@endsection
