@extends('layouts.sideNav')
@section('content')

<center>
    <h2>List of Product</h2><br>
</center>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">

                                    @csrf
                                    <input type="text" class="form-control" value="addtech" id="addTech" name="addTech" hidden>


                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="email">Product Name: </label>
                                            <a class="form-control">{{ $productRecord->productname }}</a>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="email">Product Details: </label>
                                            <a class="form-control">{{ $productRecord->productdetail }}</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="stock">Current Available Stock:</label>
                                            <a class="form-control">{{ $productRecord->stock }} PCS</a>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email">Limit Percentage:</label>
                                            <a class="form-control">{{ $limitPercentage }} %</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="stock">Your Request Limit:</label>
                                            <a class="form-control">{{ $productLimit }} PCS</a>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email">Enter your stock demand: </label>
                                            <input type="text" style="border: solid grey;" class="form-control" id="productname" name="productname" placeholder="ENTER BELOW YOUR LIMIT" required>
                                        </div>
                                    </div>

                                    <div style="float: right;">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-md">Back</a>
                                        <a class="btn btn-primary" role="button" href="">Request</a>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><br>
        </div>
    </div>
</div>

@endsection