@extends('layouts.app_master')

@section('title', 'Contact')

@section('main-content')

<div class="columns is-mobile is-centered">
  <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
    @if (session('success'))
      <div class="notification is-success center-notification contact-notification">
        <button class="delete contact-delete-notification"></button>
        {{ session('success')  }}
      </div>
    @endif

    @if (session('error'))
      <div class="notification is-danger center-notification contact-notification">
        <button class="delete contact-delete-notification"></button>
        {{ session('error')  }}
      </div>
    @endif

    <section class="section whitesmoke-section">
      <h2 class="title is-2">Contact Us</h2>

      <form class="form" method="POST" action="{{ route('contact/store') }}">
        @csrf

        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field required">
              <label class="label">First Name
                <span class="contact-red-asterisk">*</span>
              </label>
              
              <div class="control">
                <input id="first_name" class="input" type="text" 
                  placeholder="First Name" name="first_name">
                
                @if ($errors->has('first_name'))
                  <small class="form-test invalid-feedback">
                    {{ $errors->first('first_name') }}
                  </small>
                @endif
              </div>
            </div>
    
            <div class="field">
              <label class="label">Last Name</label>
              
              <div class="control">
                <input id="last_name" class="input" type="text" 
                  placeholder="Last Name" name="last_name">
              </div>
            </div>
          </div>
        </div>
            
        <div class="field">
          <label class="label">Email
            <span class="contact-red-asterisk">*</span>
          </label>
          <div class="control has-icons-left has-icons-right">
            <input id="email" class="input" type="email" placeholder="Email" name="email">
            
            @if ($errors->has('email'))
              <small class="form-test invalid-feedback">{{ $errors->first('email') }}</small>
            @endif

            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>

            <span id="contact-triangle" class="icon is-small is-right">
              <i class="fas fa-exclamation-triangle"></i>
            </span>
          </div>
        </div>

        <div class="field">
          <label class="label">Message
            <span class="contact-red-asterisk">*</span>
          </label>
          <div class="control">
            <textarea id="message" class="textarea is-invalid" 
              placeholder="Type your message here" name="message">
            </textarea>
            
            @if ($errors->has('message'))
              <small class="form-test invalid-feedback">{{ $errors->first('message') }}</small>
            @endif
          </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button id="submit" class="button button-filled is-rounded contact">Submit</button>
          </div>
          
          <div class="control">
            <button id="clear" type="button" class="button is-text contact-ahref">Clear</button>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>

@endsection