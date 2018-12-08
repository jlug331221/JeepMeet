<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'JeepUp') }} | @yield('title')</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <header>
                <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
                    <div class="container"> 
                        <div class="navbar-brand">
                            <a href="/"><h1 class="brand-name navbar-item">JeepUp</h1></a>
                        
                            <a role="button" class="navbar-burger burger is-active" aria-label="menu" aria-expanded="false" data-target="jeepup-navbar">
                                <span aria-hidden="true"></span>
                                <span class="small-burger" aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                            </a>
                        </div>
                    
                        <div id="jeepup-navbar" class="navbar-menu is-active">
                            <div class="navbar-start">
                                <a class="navbar-item" href="{{ url('/home') }}">
                                    <strong>Home</strong>
                                </a>

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
                                    <div class="buttons">
                                    <a class="button is-rounded" href="{{ url('/register') }}"><strong>Sign Up</strong></a>
                                        <a class="button is-rounded" href="{{ url('/login') }}"><strong>Login</strong></a>
                                    </div>
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
                    <p><span class="footer-brand">JeepUp</span>&nbsp;<small>&copy;</small>&nbsp;{{ date('Y') }}</p>
                    <p>Privacy Statement</p>
                    <a href="mailto:thejeepup@gmail.com">thejeepup@gmail.com</a>
                </div>
            </footer>
        </div> <!-- End of Vue application div tag -->
    </body>

</html>
