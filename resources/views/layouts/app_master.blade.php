<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

  <!-- Title is handled on the Vue side -->
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="has-navbar-fixed-top">
  @routes
  @inertia
</body>

</html>
