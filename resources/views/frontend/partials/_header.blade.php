<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>FreshFood</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>
    <div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delive &amp; Free Returns</span>
					    </div>	
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('home')}}">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        	<ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="{{route('products')}}" class="nav-link">Shop</a></li>
	        	<li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Blog</a></li>
	        	<li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
				<li class="nav-item dropdown">
						@auth
							<a class="nav-link text" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
							</a>
								<div class="nav-link dropdown-menu" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="#">Profile</a>
									<a class="dropdown-item" href="#">Orders</a>
									<a class="dropdown-item" href="#">Favourites</a>
									<a class="dropdown-item" href="#">Inbox</a>
									<a class="dropdown-item" href="#">Experiences</a>
									<a class="dropdown-item" href="#">Account</a>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										Log Out
									</a>
								</div>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								    @csrf
								</form>
						@else
							<li class="nav-item">
								<a href="{{ route('login.form') }}" class="nav-link">Sign In</a>
							</li>
						@endauth
				</li>	        
			</ul>
	      </div>
	    </div>
	</nav>
