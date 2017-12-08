
  <head>
    <title>Laravel Blog @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    {{Html::style('css/bootstrap.min.css')}}
    {{Html::style('css/style.css')}}
    {{Html::style('font-awesome-4.7.0/css/font-awesome.min.css')}}
    {{-- {{Html::style('fonts/fontawesome4.7.0/fontawesome4.7.0.css')}} --}}
    @yield('stylesheets')

  </head>
