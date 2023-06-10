@extends('layouts.sideNav')
@section('content')
<html>
<head>
    <title>Auto-Slide Images</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {
  margin: 0;
  font-family:Verdana, sans-serif;
}


.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  z-index: 1;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
  z-index: 1;
}

/* The dots/bullets/indicators */
.dot {
  height: 7px;
  width: 7px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

/* Updated CSS for card placement */
.card {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 150%;
  z-index: 2;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
}
</style>
</head>

<div class="container">
    <div class="row justify-content-center" style="width:100%">
        <div class="col-md-8">
        
        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="{{ asset('frontend') }}/images/img1.jpg" style="width:1000px; height:270px;">
                <div class="text">Jalan Bacang, Kota Masai</div>
            </div>

            <div class="mySlides fade">
                <img src="{{ asset('frontend') }}/images/img2.jpg" style="width:1000px; height:270px">
                <div class="text">Jalan Kenari, Taman Scientex</div>
            </div>

            <div class="mySlides fade">
                <img src="{{ asset('frontend') }}/images/img3.jpg" style="width:1000px; height:270px">
                <div class="text">Jalan Betik, Kota Masai</div>
            </div>
    
            </div>

            <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
            </div> 

            <!-- Placing the card on top of the images -->
            <div class="card" style="width:80%;">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as a Manager!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    slides[i].style.left = "100%"; // Hide slides off the right side
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  slides[slideIndex-1].style.left = "0"; // Show slide by moving it from right to left
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change slide every 2 seconds
}
</script>


</body>
</html>
@endsection
