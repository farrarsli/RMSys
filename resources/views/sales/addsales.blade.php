@extends('layouts.sideNav')

@section('content')


<center><h1>Add Sales</h1></center><br>
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
                                    <form action="{{ route('insertsales') }} " enctype="multipart/form-data" method="POST" id="formNew" onsubmit="upload()">
                                        @csrf
                                        <input type="text" class="form-control" value="addtech" id="addTech" name="addTech" hidden>

                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Person in Charge: </label>
                                                <a>{{ Auth::user()->name }}</a>
                                            </div>
                                        </div>

                                
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label for="branchname">Branch Name </label><br>
                                                <select class="form-control" name="branchname" id="branchname" required>
                                                    <option value="Kelisa">Jalan Kelisa, Taman Kota Masai</option>
                                                    <option value="Kenari">Jalan Kenari, Taman Scientex</option>
                                                    <option value="Betik">Jalan Betik, Taman Cendana</option>
                                                    <option value="Pelanduk">Jalan Pelanduk, Taman Scientex</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="email">Total Sales</label><br>
                                                <input  class="form-control" type="number" id="totalsales" name="totalsales" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="email">Sales Update Date </label><br>
                                                <input class="form-control" type="date" id="date" name="salesdate" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Sales Evidence </label><br>
                                                <input type="file" id="myFile" name="sales_img" required onchange="previewFile()">
                                            </div>
                                        </div>
                                        
                                       <!---Preview Image--->
                                        <img id="previewImage" src="#" alt="Preview" style="display: none; width: 200px; ">
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
<script>
    window.addEventListener('load', function() {
        var select = document.getElementById("mySelect");
        var selectedInputId = select.value;
        var selectedInput = document.getElementById(selectedInputId);
        selectedInput.style.display = "block";
    });
</script>

<script>
    function previewFile() {
      const fileInput = document.getElementById('myFile');
      const previewImage = document.getElementById('previewImage');

      const file = fileInput.files[0];

      if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function () {
          previewImage.src = reader.result;
          previewImage.style.display = 'block';
        });

        reader.readAsDataURL(file);
      }
    }
  </script>