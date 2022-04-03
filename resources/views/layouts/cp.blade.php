<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title') | Mitrabakti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('before-style')
    @include('includes.cp.style')
    @stack('after-style')
  </head>
  <body>
    @include('includes.cp.navbar')
    @yield('content')
    @include('includes.cp.footer')
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    @stack('before-script')
    @include('includes.cp.script')
    @stack('after-script')
  </body>
</html>
