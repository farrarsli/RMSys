@extends('layouts.sideNav')

@section('content')

<center><h1>Add New User</h1></center><br>
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
                                    <form action="{{ route('addUser') }} " enctype="multipart/form-data" method="POST" id="formNew" onsubmit="upload()">
                                        @csrf
                                        <input type="text" class="form-control" value="addtech" id="addTech" name="addTech" hidden>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Full Name </label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Email </label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            <label for="email">IC Number </label>
                                                <input type="number" class="form-control" id="ic" name="ic" placeholder="Enter your IC number" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                            <label for="email">Category </label><br>
                                                <select class="form-control" name="category" id="category">
                                                    <option value="Clerk">Clerk</option>
                                                    <option value="Manager">Branch Manager</option>
                                                    <option value="Owner">Owner</option>
                                                </select>
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
    </div> php artisan make:migration create_product_table --table=product
</div>
@endsection
<script>
    window.addEventListener('load', function() {
        var select = document.getElementById("mySelect");
        var selectedInputId = select.value;
        var selectedInput = document.getElementById(selectedInputId);
        selectedInput.style.display = "block";
    });
</script>