@extends('layouts.sideNav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center><h2>{{ __('Welcome to RMSyst system!') }}</h2></center> <br>
                    <center>{{ __('You have successfully logged in as a Clerk.') }}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
