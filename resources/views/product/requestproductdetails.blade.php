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
                                            <label for="email">Limit Percentage:</label>
                                            <form method="POST" action="{{ route('insertStock', ['salesid' => request()->segment(2), 'productid' => request()->segment(3)]) }}" enctype="multipart/form-data" id="formNew">
                                                @csrf
                                                <input type="text" style="border: solid grey;" class="form-control" id="requeststock" name="requeststock" placeholder="ENTER BELOW YOUR LIMIT" required oninput="checkLimit()">

                                        </div>
                                    </div>
                                    <div class="btn-group" style="float: right;">
                                        <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                </div>
                </li>
                </ul>
            </div><br>
        </div><br>
    </div>
</div>
</div>

@endsection
<script>
    function checkLimit() {
        var insertStock = parseInt(document.getElementById("requeststock").value);
        var productLimit = parseInt("{{ $productLimit }}"); // Assuming $productLimit is a PHP variable with the product limit value

        var submitButton = document.getElementById("submitButton");

        if (insertStock > productLimit) {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    }
</script>
