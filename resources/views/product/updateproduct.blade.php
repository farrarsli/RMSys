@extends('layouts.sideNav')
@section('content')

<center><h1>Update Product Details</h1></center><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('editProduct', $register->id) }} " enctype="multipart/form-data" method="POST" id="editProduct">
                                        @csrf
                                        @method('post')

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Product Name </label>
                                                <input type="text" class="form-control" id="productname" name="productname" value="{{$register->productname}}" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Product Details </label>
                                                <input type="text" class="form-control" id="productdetail" name="productdetail" value="{{$register->productdetail}}" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="stock">Stock Quantity </label>
                                                <input type="number" class="form-control" id="stock" name="stock" value="{{$register->stock}}" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="email">Product Image </label><br>
                                                <input type="file" id="myFile" name="product_img" required onchange="previewFile()" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div style="float: right;">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-md">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-md" id="btn" onclick="updateData(this)" data-link="{{ route('editProduct', $register->id) }}" data-idform="editProduct" data-btnNameChange="Updating..."><span class="nav-link-text">Update</span></button>
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