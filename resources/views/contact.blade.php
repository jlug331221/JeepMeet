@extends('layouts.app_master')

@section('title', 'Contact')

@section('main-content')

<div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
        <section class="section whitesmoke-section">
            <h2 class="title is-2">Contact Us</h2>

            <form action="">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field required">
                        <label class="label">First Name
                            <span class="contact-red-asterisk">*</span>
                        </label>
                            <div class="control">
                                <input class="input" type="text" placeholder="First Name" required>
                            </div>
                        </div>
                
                        <div class="field">
                            <label class="label">Last Name</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Last Name">
                                </div>
                         </div>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label">Email
                        <span class="contact-red-asterisk">*</span>
                    </label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Message
                        <span class="contact-red-asterisk">*</span>
                    </label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Type your message here" required></textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button button-filled is-rounded">Submit</button>
                    </div>
                    <div class="control">
                        <button class="button is-text contact-ahref">Clear</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

@endsection