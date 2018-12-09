@extends('layouts.app_master')

@section('title', 'Join')

@section('main-content')

<div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
        <section class="section is-medium has-text-left whitesmoke-section join-box">
            <h2 class="title is-2">Join Now</h2>

            <form action="">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded has-icons-left">
                                <input type="text" class="input" placeholder="First Name">
                                <span class="icon is-small is-left">
                                    <i class="far fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control is-expanded has-icons-left">
                                <input type="text" class="input" placeholder="Last Name">
                                <span class="icon is-small is-left">
                                    <i class="far fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control has-icons-left">
                        <input type="text" class="input" placeholder="Username">
                        <span class="icon is-small is-left">
                            <i class="far fa-user-circle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control has-icons-left">
                        <input type="email" class="input" placeholder="Email">
                        <span class="icon is-small is-left">
                            <i class="far fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control has-icons-left">
                        <input type="email" class="input" placeholder="Confirm Email">
                        <span class="icon is-small is-left">
                            <i class="far fa-envelope"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control has-icons-left">
                        <input type="password" class="input" placeholder="Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control has-icons-left">
                        <input type="password" class="input" placeholder="Confirm Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button button-filled is-rounded">Join</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection
