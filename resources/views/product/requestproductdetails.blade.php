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
                                            <a>{{ $productRecord->productname }}</a>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Product Details: </label>
                                            <a>{{ $productRecord->productdetail }}</a>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Current Available Stock: </label>
                                            <a>{{ $productRecord->stock }}</a>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="email">Limit set for product request: </label>
                                            <a>{{ $limitPercentage }}</a>
                                        </div>

                                        <!--input stock-->


                                    </div>

                                    <div style="float: right;">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-md">Back</a>

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