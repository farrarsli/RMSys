@extends('layouts.sideNav')

@section('content')
<head>
    <title>Auto-Slide Images</title>
    <style>
        .slide {
            display: none;
        }
    </style>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($dashboard as $slide)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ $slide->public/frontend/images/img1.jpg }}" class="d-block w-100" alt="{{ $slide->caption }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slide->caption }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

<script>
    // Activate the carousel
    $('.carousel').carousel();
</script>




            <div class="card">
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


@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var slides = $('.slide');
                var currentSlideIndex = 0;

                function showSlide() {
                    slides.hide();
                    slides.eq(currentSlideIndex).show();
                    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
                }

                setInterval(showSlide, 3000);
            });
        </script>