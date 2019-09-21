<html>
    <head>
        <title>App Name - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            .container {
                margin-top: 40px;
            }
        </style>
    </head>
    <body>
        @section('header')
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed">
              <a class="navbar-brand" href="{{URL::to('/')}}">Book Store</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                  @if(!auth()->user())
                      <a class="nav-item nav-link {{ $page == 'register' ? 'active' : ''}}" href="{{URL::to('register')}}">Register</a>
                      <a class="nav-item nav-link {{ $page == 'login' ? 'active' : ''}}" href="{{URL::to('login')}}">Login</a>
                  @else
                      <a class="nav-item nav-link" href="{{URL::to('logout')}}">Logout</a>
                  @endif
                </div>
              </div>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        @yield('JS')
    </body>
</html>