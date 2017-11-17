<!doctype html>
<html lang="en">
@include('partials._head')
  <body>
    @include('partials._nav')
<div class="container"><!-- start main container-->
@include('partials._message')
@yield('content')
</div><!-- ./start main container-->
@include('partials._footer')
@include('partials._javascripts')
@yield('scripts')
  </body>
</html>
