<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('include.head')
  </head>
  <body class="antialiased">
    <div id="app" class="h-screen bg-gradient-to-b from-purple-600 to-purple-900">
      <vue-navbar></vue-navbar>
      @yield('contenido-principal')
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
  </body>
</html>
