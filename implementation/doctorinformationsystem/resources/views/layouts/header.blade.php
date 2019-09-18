<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            
            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
           
            .top-right {
                position: absolute;
                right: 10px;
                top: 5px;
            }
            
        </style>
    </head>
    <body>
           
        <div class="flex-center position-ref">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="/">Doctor information System</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav">
                            <li class="nav-item active">
                              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Contact Us</a>
                            </li>
                              <li>
                                  @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Profile</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary ml">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                              </li>
                          </ul>
                        </div>
                      </nav>
            
        </div>
       
        <div class="main">
            @yield('content')
          </div>

    </body>

    <script>
        
        (function() {
            const locations = document.getElementById('location');
            const doctors = document.getElementById('doctor');
            locations.onchange = function(e) {
                const hideRows = doctors.querySelectorAll('tbody tr:not([data-location="'+ this.value +'"])');
                const showRows = doctors.querySelectorAll('tbody tr[data-location="'+ this.value +'"]');
                hideRows.forEach(function(elem) {
                    elem.style.display = 'none';
                });
                showRows.forEach(function(elem) {
                    elem.style.display = 'table-row';
                });
            };
        })();
        
    </script>
    <script src="https://kit.fontawesome.com/e1cda2a4eb.js"></script>
    @yield('scripts')
</html>
