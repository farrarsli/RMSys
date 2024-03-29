@extends('layouts.sideNav')
@section('content')

<center>
    <h2>Limit Details</h2>
</center><br>
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

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">

                                    @csrf
                                    <input type="text" class="form-control" value="addtech" id="addTech" name="addTech" hidden>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="email">Branch Name: </label>
                                            <a>{{ $salesRecord->branchname }}</a>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Total Sales: </label>
                                            <a>{{ $salesRecord->totalsales }}</a>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Updated Sales Date: </label>
                                            <a>{{ $salesRecord->salesdate }}</a>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Calculated limit percentage based on sales: </label>
                                            <a>{{ $limitPercentage }} %</a>
                                        </div>
                                    </div>

                                    <div style="float: right;">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-md">Back</a>

                                
                                        @if( $salesRecord->sales_status== "Approved")
                                            <a href="{{ route('allowrequest',$salesRecord->id) }}" class="btn btn-primary">Allow Request</a>
                                        @endif


                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection