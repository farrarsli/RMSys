@extends('layouts.sideNav')
@section('content')
<html>

<head>
  <title>Auto-Slide Images</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Verdana, sans-serif;
    }


    .mySlides {
      display: none;
    }

    img {
      vertical-align: middle;
    }

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
      background-color: #bd1924;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {
        font-size: 11px
      }
    }

    /* Updated CSS for card placement */
    .card {
      position: relative;
      /* Change from absolute to relative */
      margin: 10px auto;
      /* Adjust margin as needed */
      width: 80%;
      /* Adjust width as needed */
      z-index: 2;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
    }

    /*---------------------------------DUMMY DASHBOARD---------------------------------*/
    
    .circle-tile {
      margin-bottom: 15px;
      text-align: center;
    }

    .circle-tile-heading {
      border: 3px solid rgba(255, 255, 255, 0.3);
      border-radius: 100%;
      color: #FFFFFF;
      height: 55px;
      margin: 0 auto -20px;
      /* Adjusted margin to move the circle up */
      position: relative;
      transition: all 0.3s ease-in-out 0s;
      width: 55px;
    }


    .circle-tile-heading .fa {
      line-height: 50px;
    }

    .circle-tile-content {
      padding-top: 20px;
    }

    .circle-tile-number {
      font-size: 20px;
      font-weight: 700;
      line-height: 1;
      padding: 5px 0 15px;
    }

    .circle-tile-description {
      text-transform: uppercase;
    }

    .circle-tile-footer {
      background-color: rgba(0, 0, 0, 0.1);
      color: rgba(255, 255, 255, 0.5);
      display: block;
      padding: 5px;
      transition: all 0.3s ease-in-out 0s;
    }

    .circle-tile-footer:hover {
      background-color: rgba(0, 0, 0, 0.2);
      color: rgba(255, 255, 255, 0.5);
      text-decoration: none;
    }

    .circle-tile-heading.dark-blue:hover {
      background-color: #2E4154;
    }

    .circle-tile-heading.green:hover {
      background-color: #138F77;
    }

    .circle-tile-heading.orange:hover {
      background-color: #DA8C10;
    }

    .circle-tile-heading.blue:hover {
      background-color: #2473A6;
    }

    .circle-tile-heading.red:hover {
      background-color: #CF4435;
    }

    .circle-tile-heading.purple:hover {
      background-color: #7F3D9B;
    }

    .tile-img {
      text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
    }

    .dark-blue {
      background-color: #34495E;
    }

    .green {
      background-color: #16A085;
    }

    .blue {
      background-color: #2980B9;
    }

    .orange {
      background-color: #F39C12;
    }

    .red {
      background-color: #E74C3C;
    }

    .purple {
      background-color: #8E44AD;
    }

    .dark-gray {
      background-color: #7F8C8D;
    }

    .gray {
      background-color: #95A5A6;
    }

    .light-gray {
      background-color: #BDC3C7;
    }

    .yellow {
      background-color: #F1C40F;
    }

    .text-dark-blue {
      color: #34495E;
    }

    .text-green {
      color: #16A085;
    }

    .text-blue {
      color: #2980B9;
    }

    .text-orange {
      color: #F39C12;
    }

    .text-red {
      color: #E74C3C;
    }

    .text-purple {
      color: #8E44AD;
    }

    .text-faded {
      color: rgba(255, 255, 255, 0.7);
    }
    
  </style>
</head>
<center>
  <h3>Welcome! You are successfully logged in as a Clerk.</h3>
</center><br>
<div class="container">
  <div class="row" style="width:100%">
    <div class="col-md-8">
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
      <!----------------------IMAGE SLIDESHOW--------------------------->
      <div class="slideshow-container">
        <div class="mySlides fade">
          <img src="{{ asset('frontend') }}/images/img1.jpg" style="width:1040px; height:210px;">
          <div>Branch: Jalan Bacang, Kota Masai</div>
        </div>
        <div class="mySlides fade">
          <img src="{{ asset('frontend') }}/images/img2.jpg" style="width:1040px; height:210px">
          <div>Branch: Jalan Kenari, Taman Scientex</div>
        </div>
        <div class="mySlides fade">
          <img src="{{ asset('frontend') }}/images/img3.jpg" style="width:1040px; height:210px">
          <div>Branch: Jalan Betik, Kota Masai</div>
        </div>
        <div class="mySlides fade">
          <img src="{{ asset('frontend') }}/images/img4.jpg" style="width:1040px; height:210px">
          <div>Branch: Jalan Pelanduk, Taman Scientex</div>
        </div>
        <div class="mySlides fade">
          <img src="{{ asset('frontend') }}/images/img5.jpg" style="width:1040px; height:210px">
          <div>Branch: Jalan Aurora, Taman Air Biru</div>
        </div>
      </div>
    </div>
    <!----------------------------DOT-------------------------------->
    <div style="text-align:center; width:100%">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </div>
</div>

<!-----------------------------------------------INFO---------------------------------------------------->
<div class="container bootstrap snippet">
  <div class="row">
    <div class="col-sm-4">
      <div class="card" style="height:210px">
        <div class="card-body">
          <div class=" col-sm-18">
            <div class="circle-tile">
              <a href="#">
                <div class="circle-tile-heading dark-gray">
                  <i class="fa fa-file-text fa-fw fa-2x"></i>
                </div>
              </a>
              <div class="circle-tile-content dark-gray">
                <div class="circle-tile-description text-faded">Registered User</div>
                <div class="circle-tile-number text-faded">10</div>
                <a class="circle-tile-footer" href ="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-sm-4">
      <div class="card" style="height:210px">
        <div class="card-body">
          <div class=" col-sm-14">
            <div class="circle-tile ">
              <a href="#">
                <div class="circle-tile-heading orange"><i class="fa fa-file-text fa-fw fa-2x"></i>
                </div>
              </a>
              <div class="circle-tile-content orange">
                <div class="circle-tile-description text-faded">Registered Product</div>
                <div class="circle-tile-number text-faded ">30</div>
                <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card" style="height:210px">
        <div class="card-body">
          <div class=" col-sm-14">
            <div class="circle-tile ">
              <a href="#">
                <div class="circle-tile-heading red"><i class="fa fa-file-text fa-fw fa-2x"></i>
                </div>
              </a>
              <div class="circle-tile-content red">
                <div class="circle-tile-description text-faded">Approved Branch</div>
                <div class="circle-tile-number text-faded ">4</div>
                <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
              </div>
            </div>
          </div>
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
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    slides[slideIndex - 1].style.left = "0"; // Show slide by moving it from right to left
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 2000); // Change slide every 2 seconds
  }
</script>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>
@endsection