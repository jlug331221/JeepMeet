@extends('layouts.app_master')

@section('title', 'About')

@section('main-content')

<section class="section">
  <div class="columns is-centered">
    <div class="column is-full-mobile is-three-fifths-tablet is-three-fifths-desktop 
      is-half-widescreen">
      <h1 class="is-size-3-mobile is-size-2-tablet is-size-1-desktop 
        has-text-centered has-text-weight-bold">About JeepMeet</h1>
      
      <p class="has-text-justified about-montserrat-p-text">
        JeepMeet is a project that was brought to fruition by two guys looking for something to do 
        during off hours from government work. One guy has a passion for Jeeps and learning, while 
        the other has a passion for guitars and learning. Mostly, this project is a means to 
        connect people who are Jeep enthusiasts. Even if you aren't overly passionate about 
        Jeeps, JeepMeet can still help you connect with fellow Jeepers. We are constantly looking 
        for ways to make the appliction better for our users and always appreciate feedback.
      </p>

      <p class="has-text-justified about-montserrat-p-text">
        The JeepMeet application is built using the <a href="https://laravel.com/" 
        class="about-laravel-text has-text-weight-semibold">Laravel</a> Framework. The site is 
        hosted via <a href="https://www.digitalocean.com/" 
        class="about-digitalocean-text has-text-weight-semibold">Digital Ocean</a>. All of our 
        source code can be viewed on <a href="https://github.com/jlug331221/JeepMeet" 
        class="about-github-text has-text-weight-semibold">GitHub</a>. There are plans to build 
        a mobile application in the future for both <span class="icon is-small">
        <i class="fab fa-android"></i></span> and <span class="icon is-small">
        <i class="fab fa-apple"></i></span>. We started with a web application to reach as many 
        people as possible early on, but keep an eye out for the mobile applications.
      </p>
    </div>
  </div>
</section>

@endsection