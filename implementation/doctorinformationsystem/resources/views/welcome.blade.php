<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Doctor information system</title>

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
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            /* .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            } */

            .position-ref {
                position: relative;
            } 

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            .container {
                max-width: 80%;
                margin: auto;
            }
            .mt-5 {
                margin-top: 5rem;
            }
            table {
                border-collapse: collapse;
            }
            table td, table th {
                padding: 4px 8px;
                text-align: left;
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
                            
                          </ul>
                        </div>
                      </nav>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Profile</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="container">
            <form action="javascript:;" method="POST">
                <div>
                    <select name="location" id="location" class="col-md-6">
                        <option value="">SELECT</option>
                        @php
                            $locations = $doctors->pluck('location')->unique();
                        @endphp
                        @foreach($locations as $location)
                        <option value="{{ $location }}">{{ ucwords($location) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <table id="doctor" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr data-location="{{ $doctor->location }}">
                                    <td>{{ ucwords($doctor->name) }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ ucwords($doctor->location) }}</td>
                                    <td><button type="button">view</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    <div class="container-fluid" style="height:500px">
            <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="..." class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="..." class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="..." class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                          </div>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
    </div>
        <div class="container">
            <h2>Latest Post</h2>
                <div class="card-group">
                        <div class="card col-md-4">
                          <img src="..." class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          </div>
                        </div>
                        <div class="card col-md-4">
                          <img src="..." class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          </div>
                        </div>
                        <div class="card col-md-4">
                          <img src="..." class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          </div>
                        </div>
                      </div>
        </div>
        <div class="container-fluid">
            <h2>Top Doctors</h2>
            <div class="row">
                <div class="card-group">
                    <div class="card col-md-4">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                    </div>
                </div>
            </div>
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
</html>
