<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'JeepMeet') }}</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="has-navbar-fixed-top">
  <div id="app">
    <header>
      <nav class="navbar is-fixed-top is-transparent" role="navigation" 
        aria-label="main navigation">
        <div class="container"> 
          <div class="navbar-brand">
            <a href="/"><h1 class="brand-name navbar-item">JeepMeet</h1></a>
        
            <a role="button" class="navbar-burger burger is-active" 
              aria-label="menu" aria-expanded="false" data-target="jeepup-navbar">
              <span aria-hidden="true"></span>
              <span class="small-burger" aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>
        
          <div id="jeepup-navbar" class="navbar-menu is-active">
            <div class="navbar-start">
              @auth
                <a class="navbar-item" href="{{ url('/profile') }}">
                    <strong>Profile</strong>
                </a>

                <a class="navbar-item" href="{{ url('/events') }}">
                  <strong>Events</strong>
                </a>
              @endauth

              <a class="navbar-item" href="{{ url('/forum') }}">
                <strong>Forum</strong>
              </a>

              <a class="navbar-item" href="{{ url('/news') }}">
                <strong>News</strong>
              </a>

              <a class="navbar-item" href="{{ url('/about') }}">
                <strong>About</strong>
              </a>

              <a class="navbar-item" href="{{ url('/contact') }}">
                <strong>Contact</strong>
              </a>
            </div>
          
            <div class="navbar-end">
              <div class="navbar-item">
                @guest
                  <div class="buttons">
                    <a class="button button-empty is-rounded login-button" 
                      href="{{ url('/login') }}"><strong>Login</strong></a>
                    <a class="button button-filled is-rounded signup-button" 
                      href="{{ url('/register') }}"><strong>Join</strong></a>
                  </div>
                @endguest

                @auth
                  <div class="buttons">
                    <a class="buttons button-empty is-rounded" href="">
                      <strong>Logout</strong>
                    </a>
                  </div>    
                @endauth
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
      
    <main class="main-wrapper">
      @yield('main-content')
    </main>

    <footer class="footer">
      <div class="content has-text-centered">
        <p><small>&copy;</small>&nbsp;<span class="footer-brand">JeepMeet</span>
          2018-{{ date('Y') }}.&nbsp;All rights reserved.</p>
        
        <p><a href="#">Legal Notice</a></p>
        
        <p><a href="#">Privacy Statement</a></p>
        
        <a href="mailto:jeepmeetup@gmail.com">
          <span class="icon">
            <i class="far fa-envelope fa-lg envelope-contact-us"></i>
          </span>
        </a>

        <a href="https://github.com/jlug331221/JeepMeet">
          <span class="icon">
            <i class="fab fa-github fa-lg"></i>
          </span>
        </a>
      </div>
    </footer>
  </div> <!-- End of Vue application div tag -->
</body>

</html>
