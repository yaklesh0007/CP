
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="{{assets/js/jquery-3.3.1.min.js}}"></script> 
	<script src="{{assets/js/bootstrap.min.js}}"></script>
  <link href="{{assets/font-awesome/css/font-awesome.min.css}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	
	<title>@yield('title')</title>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
       
				<img  src="#" alt="logo of Cybersecurity">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 topbar">
				  <h1 class="mt-4">Curious Cybersecurity</h1>
          
			</div>
		</div>
	</div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="{{}}">Doctor information system</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><b>Home</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about"><b>About us</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php"><b>Contact us</b></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="ourapproaches.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Approaches
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="ourapproaches.php">Training</a>
          <a class="dropdown-item" href="ourapproaches.php">Booking</a>
        </div>

      </li>
     <li class="nav-item">
        <a class="nav-link" href="services.php">Services</a>
      </li>
      <?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    
       ?>
 <li class="nav-item">
        <a class="nav-link btn btn-primary" href="user.php"><b><?php echo $_SESSION['email']; ?></b></a>
      </li>
      <?php } ?>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>

</nav>
@yield('nav')