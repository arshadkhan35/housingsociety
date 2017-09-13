@extends('layouts.app')

@section('content')
    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">
    <style>
    body{
    background-color: #f8f8f8;
    }
    h1{
        text-align: center;
    font-size: 53px;
    font-family: serif;
    font-style: oblique;
    }
    ul li{
    list-style-type: none;
    }
    .notice-list {
        border: 1px solid #cec4c4;
    border-radius: 7px;
    box-shadow: 5px 5px 3px #cec4c4;
    }
    ul{
    padding-left: 10px;
    }
    .notice-list-title{
        padding: 20px 0px;
    }
    .notice-list-title span{
    font-weight: bold;
    }
    .contact-us{
        margin-left: 10px;
    margin-right: 10px;
    }
    input::placeholder{
    padding: 5px;
    }
    </style>
<!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/housing_crousel1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Runwal Complex</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/housing_crousel2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Runwal paradise</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('images/housing_crousel3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Runwal Square</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
    <div class="container">
    <div class="row"> 
    <h1>Runwal Paradise</h1>
    <div class="col-md-4 notice-list">
    <div class="notice-list-title"><span>Recent Notices</span>
    <ul>
     @foreach($notices as $notice)
    <li><a href="notice-board/{!! $notice['id'] !!}">{{ substr($notice['description'], 0, 35) }}</a></li>
    @endforeach
    </ul>

    </div>
    </div>
    <div class="col-md-3 notice-list contact-us" >
    <div class="notice-list-title"><span>Contact us</span>
    </div>
    <form action="/contct-us" method="GET">
<div class="form-group">
    <input type="text" id="name" name="name" placeholder="Full Name" required>
  </div>
  <div class="form-group">
    <input type="email" id="emalid" name="emailid" placeholder="Email ID" required>
  </div>
  <div class="form-group">
    <input type="text" id="mobileno" name="mobileno" placeholder="Mobile Number" required>
    </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary upload-btn">Submit</button>
  </div>
  
</form>
    </div>
    <div class="col-md-4 notice-list" >
    <div class="notice-list-title"><span>Amenities</span>
    <ul>
    <li><a href="/club-house">Society Clubhouse</a></li>
    <li><a href="/society-gym">Society Gym</a></li>
    <li><a href="/about-us">About Us</a></li>
    </ul>
    </div>
    </div>
    </div>
    </div>
 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
    jQuery('.dropdown').click(function() {jQuery('.dropdown-menu').show();jQuery('.dropdown-toggle').attr('aria-expanded',true)});
    </script>
@endsection
