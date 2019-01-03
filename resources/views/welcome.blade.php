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

<section class="section is-medium">
    <div class="columns is-mobile is-centered welcome-hero-text">
        <div class="column is-full-mobile is-full-tablet is-full-desktop">
            <section class="hero">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title is-size-3-mobile is-size-2-tablet is-size-1-desktop">Welcome to JeepMeet</h1>
                        <h2 class="subtitle">The One Stop Place to Meet Fellow Jeepers</h2>
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
    
                <h3 class="welcome-h3 has-text-weight-semibold is-size-6-mobile is-size-5-tablet is-size-4-desktop">Schedule a JeepMeet</h3>
            </section>
        </div>
    
        <div class="column is-full-mobile is-one-third-tablet is-one-third-desktop">
            <section class="section has-text-centered">
                <figure class="image is-96x96 welcome-small-figures">
                <img src="{{ asset('svg/roads.svg') }}" alt="Roads Traveled via Jeeps">
                </figure>
    
                <h3 class="welcome-h3 has-text-weight-semibold is-size-6-mobile is-size-5-tablet is-size-4-desktop">Travel to Your JeepMeet</h3>
            </section>
        </div>
    
        <div class="column is-full-mobile is-one-third-tablet is-one-third-desktop">
            <section class="section has-text-centered">
                <figure class="image is-96x96 welcome-small-figures">
                <img src="{{ asset('svg/people.svg') }}" alt="Jeepers">
                </figure>
    
                <h3 class="welcome-h3 has-text-weight-semibold is-size-6-mobile is-size-5-tablet is-size-4-desktop">Meet Fellow Jeepers</h3>
            </section>
        </div>
    </div>
</section>

@endsection
