@extends('layouts.app_master')

@section('title', 'Welcome')

@section('main-content')

<div class="columns is-mobile is-centered welcome-topography">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
        <section class="section welcome-military-jeep">
            <figure class="image is-16by9">
                <img src="{{ asset('images/jeep_military.svg') }}" alt="Military Jeep">
            </figure>
        </section>
    </div>
</div>

<div class="columns is-mobile is-centered welcome-hero-text">
    <div class="column is-full-mobile is-full-tablet is-full-desktop">
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">Welcome to JeepMeet</h1>
                    <h2 class="subtitle">The One Stop Place to Meet Fellow Jeepers</h2>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
