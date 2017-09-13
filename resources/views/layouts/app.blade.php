<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Runwal Paradise</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="css/fontawsome.css") }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
     
   <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .footer {
    border: 1px solid burlywood;
    background: #2e6da4;
    margin-top: 28px;
    height: 100px;
}
.footer-content{
        font-size: larger;
    font-style: italic;
    font-family: serif;
    color: aliceblue;
    padding: 25px;
}
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Runwal Paradise
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    @if(Auth::user()->id == 1)
                    <li><a href="{{ url('/add-notice') }}">Add Notice</a></li>
                    <li><a href="{{ url('/userlisting') }}">Role Approval</a></li>
                    <li><a href="{{ url('/generate-bill') }}">Maintainance Bil</a></li>
                    <li><a href="{{ url('/users-complains') }}">User's Complains</a></li>
                    <li><a href="{{ url('/hall-requests') }}">Hall Request</a></li>
                    <li><a href="{{ url('/enquiry-list') }}">User Enquiries</a></li>
                    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                <li><a href="{{ url('/edit-profile') }}"><i class="fa fa-btn fa-sign-out"></i>Edit Profile</a></li>
                                <li><a href="{{ url('/add-complain') }}"><i class="fa fa-btn fa-sign-out"></i>Add Complain</a></li>
                                <li><a href="{{ url('/mycomplains') }}"><i class="fa fa-btn fa-sign-out"></i>My Complains</a></li>
                                <li><a href="{{ url('/book-hall') }}"><i class="fa fa-btn fa-sign-out"></i>Book Hall</a></li>
                                <li><a href="{{ url('/my-booking') }}"><i class="fa fa-btn fa-sign-out"></i>My Hall Booking</a></li>
                                <li><a href="{{ url('/mybill') }}"><i class="fa fa-btn fa-sign-out"></i>My Maintainace Bil</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
<div class="row footer">
<div class="col-md-4 footer-content col-md-offset-4">
@copyright Runwal Paradise Group
</div>
</div>
    <!-- JavaScripts -->
    
    <script src="js/newJquery.min.js" ></script>
    <script src="js/newBootstrap.min.js" ></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>
