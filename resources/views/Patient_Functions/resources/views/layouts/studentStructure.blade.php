<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">


    <title>Covid Tracker and Registration System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Styles -->
    <link href="../css/fontawesome/css/all.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <script src="{{ asset('js/dropzone.js') }}" ></script>
	<link rel="stylesheet" href="css/theme-beige.css" />

	<link rel="stylesheet" href="css/animate.css" />

  
	
      <style>
.ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

.li .a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

.li .a.active {
  background-color: #4CAF50;
  color: white;
}

.li .a:hover:not(.active) {
  background-color: #555;
  color: white;
}
.avatar{
  border-radius: 100%;
  width: 9%;
  height: 9%;
}

.mySlides {display: none;}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: white">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" >
                       
                        <form class="form-inline my-2 my-lg-0" action="" method="get">
                              <input  class="form-control mr-sm-2" name="result" type="search" placeholder="search..." aria-label="Search">

                              <button style="background-color: green;" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav" style="background-color: white">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                             @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                       
                        @else
                            

                            <li class="nav-item">
                                <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
                            </li>
                             <li class="nav-item" >
                               <a class="nav-link" href="Report.create" >Report</a> 
                              </li>

                              <li class="nav-item" >
                               <a class="nav-link" href="ManageReport.view" >Manage Report</a> 
                              </li>
							  
							                <li class="nav-item">
                               <a class="nav-link" href="#" >View Statistics</a> 
                              </li>

                               <li class="nav-item">
                               <a class="nav-link" href="#" >About Us</a> 
                              </li>  
                              
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret" ></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


     
    <main class="py-4" >
      @yield('content')
    </main>       
    </div>
      <!-- Footer -->
    
<footer class="page-footer font-small " style="background-color:orange">

    <!-- Footer Elements -->
    <center><div class="container" style="background-color: #00997a">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2021 Copyrights: |All rights reserved
      
    </div></center>
    <!-- Copyright -->


  </footer>
  <!-- Footer -->
</body>
</html>
