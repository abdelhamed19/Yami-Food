<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Site Metas -->
    <title>{{ $title }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href={{ asset("assets/front/images/favicon.ico" ) }} type="image/x-icon">
    <link rel="apple-touch-icon" href={{ asset("assets/front/images/apple-touch-icon.png" ) }}>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset("assets/front/css/bootstrap.min.css") }}>
	<!-- Site CSS -->
    <link rel="stylesheet" href={{ asset("assets/front/css/style.css") }}>
    <!-- Responsive CSS -->
    <link rel="stylesheet" href={{ asset("assets/front/css/responsive.css") }}>
    <!-- Custom CSS -->
    <link rel="stylesheet" href={{ asset("assets/front/css/custom.css") }}>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src={{ asset("assets/front/images/logo.png") }} alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    @if(Auth::check())
                    <li class="nav-item @if(URL::current() ==url('/')) active @endif"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item @if(URL::current() == url('/menu')) active @endif"><a class="nav-link" href="{{ route('front.menu') }}">Menu</a></li>
                    <li class="nav-item @if(URL::current() ==url('/account')) active @endif"><a class="nav-link" href="/"">Account</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Reservation & Orders</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{ route('reservation.create') }}">Reserve a Table</a>
                            <a class="dropdown-item" href="{{ route('reservation.index') }}">Your Reservation</a>
                            <a class="dropdown-item" href="{{ route('order.index') }}">Orders</a>

                        </div>
                    </li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="Logout" class="btn custom-button" >
                    </form>
                    @else
                    <li class="nav-item @if(URL::current() ==url('/')) active @endif"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item @if(URL::current() == url('/menu')) active @endif"><a class="nav-link" href="{{ route('front.menu') }}">Menu</a></li>
                    <li class="nav-item @if(URL::current() == url('/about')) active @endif"><a class="nav-link" href="{{ route('front.about') }}">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link @if(URL::current() ==url('/reservation')) active @endif dropdown-toggle  "  href="#"  data-toggle="dropdown">Reservation & Orders</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{ route('reservation.create') }}">Reserve a Table</a>
                            <a class="dropdown-item" href="{{ route('reservation.index') }}">Your Reservation</a>

                            <a class="dropdown-item" href="{{ route('order.index') }}">Orders</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route("register") }}">Register</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>
