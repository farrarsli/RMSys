@extends('layouts.main')
@section('sideNav')

<div class="container-fluid">
    <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0" style="box-shadow: none;">
            <div class="main-navbar" >
                <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0" >
                    <a class="navbar-brand w-100 mr-0" href="{{ route('dashboard') }}" style="line-height: 25px; background-color: #bd1924;">
                        <div class="d-table m-auto">
                            <img id="main-logo" class="d-inline-block align-center mr-3" style="max-width: 40px;" src="{{ asset('frontend') }}/images/logo.png" alt="RMSys logo">
                            <span class="d-none d-md-inline ml-1" style="color: white"> {{ config('app.name', 'RMsys') }}</span>
                        </div>
                    </a>
                    <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                        <i class="material-icons">&#xE5C4;</i>
                    </a>
                </nav>
            </div>

            <div class="nav-wrapper" style="background-color: #bd1924;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="material-icons" style="color: white;">info</i>
                            <b><span style="color: white;">Dashboard</span></b>
                        </a>
                    </li>

                    <!-- CLERK SIDENAV-->
                    @if( auth()->user()->category== "Clerk")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listuser*') ? 'active' : '' }}" href="{{ route('listuser') }}">
                            <i class="material-icons" style="color: white;">work</i>
                            <span style="color: white;">Manage Registration</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listproduct*') ? 'active' : '' }}" href="{{ route('listproduct') }}">
                            <i class="material-icons" style="color: white;">shopping_cart</i>
                            <span style="color: white;">Manage Product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('branchlimit*') ? 'active' : '' }}" href="{{ route('branchlimit') }}">
                            <i class="material-icons" style="color: white;">place</i>
                            <span style="color: white;">Branch Limit</span>
                        </a>
                    </li>
                    @endif

                    <!-- BRANCH MANAGER SIDENAV-->
                    @if( auth()->user()->category== "Manager")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listsales*') ? 'active' : '' }}" href="{{ route('listsales') }}">
                            <i class="material-icons" style="color: white;">money</i>
                            <b><span style="color: white;">Sales</span></b>
                        </a>
                    </li>
                    @endif

                    <!------------------------------------------ OWNER SIDENAV---------------------------------->
                    @if( auth()->user()->category== "Owner")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('salesapproval*') ? 'active' : '' }}" href="{{ route('salesapproval') }}">
                            <i class="material-icons" style="color: white;">money</i>
                            <b><span style="color: white;">Sales Approval </span></b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('owneruserlist*') ? 'active' : '' }}" href="{{ route('owneruserlist') }}">
                            <i class="material-icons" style="color: white;">inventory</i>
                           <b><span style="color: white;">Registered Users</span></b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ownerproductlist*') ? 'active' : '' }}" href="{{ route('ownerproductlist') }}">
                            <i class="material-icons" style="color: white;">inventory</i>
                           <b><span style="color: white;">Registered Products</span></b>
                        </a>
                    </li>
                    @endif

                     <!--GROUP SEP END -->

                </ul>


            </div>

        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
                <!-- Main Navbar -->
                <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0" style="background-color: white;">

                    <div class="row mt-auto mb-auto ml-3 " style="width: auto;">

                        <div class="d-md-flex mt-auto mb-auto mr-md-4 d-none" style="width: auto">

                        </div>

                    </div>
                    <ul class="navbar-nav border-left flex-row ml-auto " style="border-left: 0.3;">
                        <li class="nav-item border-right dropdown">
                            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            

                                <span class="d-none d-md-inline-block" style="color:black"><strong>{{ Auth::user()->name }}</strong><br> {{Auth::user()->category}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-small">
                                <a class="dropdown-item">
                                    <i class="material-icons">&#xE7FD;</i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons text-danger">&#xE879;</i> Logout </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <nav class="nav">
                        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                            <i class="material-icons">&#xE5D2;</i>
                        </a>
                    </nav>
                </nav>
            </div>
            <!-- / .main-navbar -->

            @if(session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-check mx-2"></i>

                {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->get('failed'))
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-times mx-2"></i>

                {{ session()->get('failed') }}
            </div>
            @endif

            <div class="main-content-container container-fluid px-4">
                <br>
                @yield('content')
            </div>

            <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                <span class="copyright ml-auto my-auto mr-2">Copyright © {{ now()->year }}
                    <a href="#" rel="nofollow">RMSRay</a>
                </span>
            </footer>

    </div>
</div>

<!-- End Page Header -->


@endsection