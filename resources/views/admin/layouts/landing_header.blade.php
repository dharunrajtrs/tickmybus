<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>Home - Taxi</title>

	@include('admin.layouts.landing_styles')

	
</head>

<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
	<!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
		</div>
	</div><!-- Loader /- -->
		
	<!-- Header Section -->
	<div class="header_s header-fix header_s1">
		<!-- SidePanel -->
		<div id="slidepanel-1" class="slidepanel">
			
		</div><!-- SidePanel /- -->
		<!-- Menu Block -->
		<div class="menu-block">
			<nav class="navbar ownavigation navbar-expand-lg">
				<!-- Container -->
				<div class="container">
					<a  class="image-logo navbar-brand" href="{{ url('homepage') }}"><img src="{{ asset('storage/uploads/website/images/' . $headers->logo) }}" alt="Logo" /></a>
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="true" aria-label="Toggle navigation">
						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbar">
						<ul class="navbar-nav">
							<li><a class="nav-link" title="Home" href="{{ url('homepage') }}">Home</a></li>
							<li><a class="nav-link" title="About Us" href="{{ url('/abouts') }}">About Us</a></li>
							<!-- <li><a class="nav-link" title="Booking" href="booking.html">Booking</a></li> -->
							<li><a class="nav-link" title="Services" href="{{ url('/services') }}">Services</a></li>
							<li><a class="nav-link" title="Contacts" href="{{ url('/contacts') }}">Contact</a></li>
						</ul>
					</div>
					<div id="loginpanel-1" class="desktop-hide">
						<div class="right toggle" id="toggle-1">
							<!-- <a id="slideit-1" class="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a> -->
							<a id="closeit-1" class="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
						</div>
					</div>
				</div><!-- Container /- -->
			</nav>
		</div><!-- Menu Block /- -->
	</div><!-- Header Section /- -->


</body>



</html>