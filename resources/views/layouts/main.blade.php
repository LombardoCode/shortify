<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('include.head')
  </head>
  <body class="antialiased">
    <div id="app" class="h-screen bg-gradient-to-b from-blue-1100 to-blue-900">
      <vue-navbar></vue-navbar>
      @yield('contenido-principal')
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
  </body>
</html>
