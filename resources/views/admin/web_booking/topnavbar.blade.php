<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TickMyBus</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<style type="text/css">

/* Custom styles */
.navbar-brand img,
.navbar-nav .nav-link img {
  margin-right: 10px;
}

.navbar-brand{
	padding: 20px;
},

.navbar-nav .nav-link {
  transition: all 0.3s ease;
}

.navbar-brand:hover,
.navbar-nav .nav-link:hover {
  color: #ff4040; /* Change color on hover */
}

.navbar-toggler {
  border: none;
}

.navbar-toggler:focus {
  outline: none;
}
.dropdown-menu.show {
    display: block;
    padding: 10px;
    border: none;
    min-height: 10rem;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: 1rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}

</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-bottom: 4rem">
  <a class="navbar-brand" href="#">
    <img src="{{ asset('assets/images/logo.png') }}" width="100" height="100" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">

		<ul class="navbar-nav">
		<button class="btn btn-outline mr-2"  style="text-decoration-color: black";>
		  <img src="{{ asset('assets/images/support.jpeg') }}" width="40" height="40" class="mr-1" alt="Support Icon">
		  Support
		</button>
		  <li class="nav-item dropdown">
		<a class="nav-link user-account dropdown-toggle" style="color: black;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  <img src="{{ asset('assets/images/user.png') }}" width="30" height="30" class="rounded-circle d-inline-block align-top" alt="User Avatar">
		  User Account
		</a>
		    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		      <a class="dropdown-item" href="#">Profile</a>
		      <a class="dropdown-item" href="#">Settings</a>
		      <div class="dropdown-divider"></div>
		      <a class="dropdown-item" href="#">Logout</a>
		    </div>
		  </li>
		</ul>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
