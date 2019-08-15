@extends('layouts.app_master')

@section('title', 'Welcome')

@section('main-content')

<div class="columns is-mobile is-centered welcome-hero-background">
  <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
    <section class="section welcome-military-jeep">
      <figure class="image is-16by9">
        <img src="{{ asset('svg/jeep_military.svg') }}" alt="Military Jeep">
      </figure>
    </section>
  </div>
</div>

<section class="section">
  <div class="columns is-mobile is-centered welcome-hero-text">
    <div class="column is-full-mobile is-full-tablet is-full-desktop">
      <section class="hero">
        <div class="hero-body">
          <div class="container">
            <h1 class="title is-size-3-mobile is-size-2-tablet 
              is-size-1-desktop">Welcome to JeepMeet</h1>

            <h4 class="welcome-montserrat subtitle">The One Stop Place to Meet Fellow Jeepers</h4>

            <em>
              <small>
                <p class="welcome-montserrat welcome-small-subtitle-text">
                  No matter the time or place, JeepMeet is here to help you find people that are 
                  just as enthusiastic and passionate about Jeeps.
                </p>
              </small>
            </em>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns is-centered">
    <div class="column is-full-mobile is-one-third-tablet is-one-third-desktop">
      <section class="section has-text-centered">
        <figure class="image is-96x96 welcome-small-figures">
          <img src="{{ asset('svg/map.svg') }}" alt="Map Location">
        </figure>

        <h3 class="welcome-h3 has-text-weight-semibold is-size-6-mobile is-size-5-tablet 
          is-size-4-desktop">Schedule a JeepMeet</h3>
      </section>
    </div>
  
    <div class="column is-full-mobile is-one-third-tablet is-one-third-desktop">
      <section class="section has-text-centered">
        <figure class="image is-96x96 welcome-small-figures">
          <img src="{{ asset('svg/roads.svg') }}" alt="Roads Traveled via Jeeps">
        </figure>

        <h3 class="welcome-h3 has-text-weight-semibold is-size-6-mobile is-size-5-tablet 
          is-size-4-desktop">Travel to Your JeepMeet</h3>
      </section>
    </div>

    <div class="column is-full-mobile is-one-third-tablet is-one-third-desktop">
      <section class="section has-text-centered">
        <figure class="image is-96x96 welcome-small-figures">
          <img src="{{ asset('svg/people.svg') }}" alt="Jeepers">
        </figure>

        <h3 class="welcome-h3 has-text-weight-semibold is-size-6-mobile is-size-5-tablet 
          is-size-4-desktop">Meet Fellow Jeepers</h3>
      </section>
    </div>
  </div>
</section>

<section class="section is-medium welcome-whitesmoke">
  <div class="columns is-centered">
    <div class="column has-text-centered is-full-mobile is-one-half-tablet is-one-half-desktop">
      <h3 class="is-size-6-mobile is-size-5-tablet is-size-4-desktop">
          Engage with members of the community on our 
          <a href="#">
            <span class="welcome-forum-text has-text-weight-bold">Forum</span>
          </a>.
      </h3>

      <div class="columns is-centered">
        <div class="column is-full-mobile is-one-third-tablet is-one-third-desktop">
          <figure class="image is-96x96 welcome-small-figures welcome-svg-margin-top">
            <img src="{{ asset('svg/forum.svg') }}" alt="Forum">
          </figure>
        </div>

        <div class="column is-full-mobile is-one-third-tablet is-one-third-desktop">
          <figure class="image is-96x96 welcome-small-figures welcome-svg-margin-top">
            <img src="{{ asset('svg/online-comments.svg') }}" alt="Online Comments">
          </figure>
        </div>
      </div>
    </div>

    <div class="column has-text-centered welcome-column-margin-top is-full-mobile 
      is-one-half-tablet is-one-half-desktop">
      @guest
        <h3 class="is-size-6-mobile is-size-5-tablet is-size-4-desktop">Join today and post your 
          first JeepMeet.</h3>

        <a class="button button-filled is-rounded signup-button welcome-signup-button" 
          href="{{ url('/join') }}"><strong>Join</strong></a>
      @endguest

      @auth
        <h3 class="is-size-6-mobile is-size-5-tablet is-size-4-desktop">Go to your profile and 
          build up that JeepMeet Cred!</h3>

        <a class="button button-empty is-rounded signup-button welcome-profile-button" 
          href="{{ url('/profile') }}"><strong>Profile</strong></a>
      @endauth
    </div>
  </div>
</section>

@endsection
