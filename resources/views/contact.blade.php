@extends('layouts.app_master')

@section('title', 'Contact')

@section('main-content')

<div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
        <section class="section whitesmoke-section">
            <h2 class="title is-2">Contact Us</h2>

            <form action="">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email input">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Textarea"></textarea>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection