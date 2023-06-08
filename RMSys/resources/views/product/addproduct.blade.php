@extends('layouts.sideNav')

@section('content')

<center><h1>Add New Product</h1></center><br>
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
                                    <form action="{{ route('insertProduct') }} " enctype="multipart/form-data" method="POST" id="formNew" onsubmit="upload()">
                                        @csrf
                                        <input type="text" class="form-control" value="addtech" id="addTech" name="addTech" hidden>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="productname">Product Name </label>
                                                <input type="text" class="form-control" id="productname" name="productname" placeholder="Enter your product name" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="productdetail">Product Detail </label>
                                                <input type="textarea" class="form-control" id="productdetail" name="productdetail" placeholder="Enter your product details" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="stock">Stock Quantity </label>
                                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter quantity" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div style="float: right;">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-md">Cancel</a>
                                            <button type="submit" id="formNew" class="btn btn-primary">Register</button>
                                        </div>

                                    </form>
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
