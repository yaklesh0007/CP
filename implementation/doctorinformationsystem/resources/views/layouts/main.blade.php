
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../front/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../front/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="black">
            <!--
        Tip 1: We can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/" class="simple-text">
                        Doctor Information System
                    </a>
                </div>
                <ul class="nav">
                    
                    <li class="{{ 'home'==request()->path()? 'active':''}}" >
                        <a class="nav-link" href="/home">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    @if(Auth::user()->role_id=='2')
                    <li class="{{ 'doctorappointment'==request()->path()? 'active':''}}">
                        <a class="nav-link" href="/doctorappointment">
                            <i class="nc-icon nc-notes"></i>
                            <p>Appointment List</p>
                        </a>
                    </li>
                    
                    <li class="{{ 'docotornotification'==request()->path()? 'active':''}}">
                        <a class="nav-link" href="/docotornotification">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    
                    <li class="{{ 'doctorposts'==request()->path()? 'active':''}}">
                        <a class="nav-link" href="/doctorposts">
                            <i class="nc-icon nc-notes"></i>
                            <p>posts</p>
                        </a>
                    </li>
                    @elseif(Auth::user()->role_id=='3')
                    <li class="{{ 'appointment'==request()->path()? 'active':''}}">
                        <a class="nav-link" href="/usersappointment">
                            <i class="nc-icon nc-notes"></i>
                            <p>Appointment List</p>
                        </a>
                    </li>
                    
                    <li class="{{ 'notification'==request()->path()? 'active':''}}">
                        <a class="nav-link" href="/notification">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="no-icon">{{ Auth::user()->name }}</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>
                               {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <main class="py-4">
              @yield('content')
          </main>
    </div>
</div>

    
</body>
<!--   Core JS Files   -->
<script src="../front/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../front/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../front/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../front/assets/js/plugins/bootstrap-switch.js"></script>

<!--  Notifications Plugin    -->
<script src="../front/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../front/assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

@yield('scripts')
</html>
