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
            <link href="{{ asset('css/icon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <!-- Styles -->
        <style>
           
            .top-right {
                position: absolute;
                right: 10px;
                top: 10px;
            }
            
        </style>
    </head>
    <body>
           
        <div class="flex-center position-ref border" >
                <nav class="navbar navbar-expand-lg ">
                    <img src="/logo/doctor.png" style="height: 50px;width: 100px;" class="image-rounded">
                        <a class="navbar-brand ml-2" href="/">Doctor information System</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav ml-2">
                            <li class="{{ '/'==request()->path()? 'active':''}}">
                              <a class="nav-link " href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="{{ 'about'==request()->path()? 'active':''}}">
                              <a class="nav-link " href="/about">About Us</a>
                            </li>
                            <li class="{{ 'help'==request()->path()? 'active':''}}">
                              <a class="nav-link " href="/help">Help</a>
                            </li>
                            <li class="{{ 'contact'==request()->path()? 'active':''}}">
                              <a class="nav-link " href="/contact">Contact Us</a>
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
    


    <!-- Footer -->

<footer class="footer pt-4 border" >

	<!-- Footer Links -->
	<div class="container text-center text-md-left">
  
	  <!-- Grid row -->
	  <div class="row">
  
		<!-- Grid column -->
		<div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
  
		  <!-- Content -->
		  <h5 class="font-weight-bold text-uppercase mb-4">About us</h5>
		  <p>Here you can use rows and columns to organize your footer content.</p>
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit amet numquam iure provident voluptate
			esse
			quasi, veritatis totam voluptas nostrum.</p>
  
		</div>
		<!-- Grid column -->
  
		<hr class="clearfix w-100 d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
  
		  <!-- Links -->
		  <h5 class="font-weight-bold text-uppercase mb-4">Useful links</h5>
  
		  <ul class="list-unstyled">
			<li>
			  <p>
				<a href="/">HOME</a>
			  </p>
			</li>
			<li>
			  <p>
				<a href="/about">ABOUT US</a>
			  </p>
			</li>
			<li>
			  <p>
				<a href="/welcompagepost">POSTS</a>
			  </p>
			</li>
			<li>
			  <p>
				<a href="/contact">CONTACT US</a>
			  </p>
			</li>
		  </ul>
  
		</div>
		<!-- Grid column -->
  
		<hr class="clearfix w-100 d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-3 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
  
		  <!-- Contact details -->
		  <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>
  
		  <ul class="list-unstyled">
			<li>
			  <p>
				<i class="fas fa-home mr-3"></i> 21 revolution paris</p>
			</li>
			<li>
				<p>
				  <i class="fas fa-phone mr-3"></i> + 1 0299192003</p>
			  </li>
			<li>
			  <p>
				<i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
			</li>
			
			
		  </ul>
  
		</div>
		<!-- Grid column -->
  
		<hr class="clearfix w-100 d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-3 col-lg-2 text-center mx-auto my-4 ">
  
		  <!-- Social buttons -->
		  <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>
  
		  <!-- Facebook -->
		  <a class=" btn border btn-primary" href="https://www.facebook.com" >
			<i class="fab fa-facebook-f"></i>
		  </a>
		  <!-- Twitter -->
		  <a  class=" btn border btn-primary" href="https://www.twitter.com" >
			<i class="fab fa-twitter" ></i>
		  </a>
		  <!-- Google +-->
		  <a  class=" btn border btn-danger" href="https://www.google.com" >
			<i class="fab fa-google-plus-g"></i>
		  </a>
		  
		  
  
		</div>
		<!-- Grid column -->
  
	  </div>
	  <!-- Grid row -->
  
	</div>
	<!-- Footer Links -->
    <div class="col-md-12">
        <hr>
    </div>
	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2019 Copyright:
	  <a href="/">Doctor Information System</a>
	</div>
	<!-- Copyright -->
  
  </footer>
  <!-- Footer -->

    </body>

    <script>
        
        (function() {
            const locations = document.getElementById('location');
            const doctors = document.getElementById('doctor');
            if(!locations) return;
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
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</html>

