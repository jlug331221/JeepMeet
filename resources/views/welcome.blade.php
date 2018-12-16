@extends('layouts.app_master')

@section('title', 'Welcome')

@section('main-content')

<div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
        <section class="section is-medium">
            <figure class="image is-16by9">
                <img src="{{ asset('storage/svg/jeep_military.svg') }}" alt="Military Jeep">
            </figure>
        </section>
    </div>
</div>

@endsection
