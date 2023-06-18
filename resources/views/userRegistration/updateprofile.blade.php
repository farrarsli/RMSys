@extends('layouts.sideNav')
@section('content')

<center>
    <h1>Update User Profile</h1>
</center><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('updateUser', $register->id) }} " enctype="multipart/form-data" method="POST" id="updateUser">
                                        @csrf
                                        @method('post')

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <img id="imgPreview" src="/assets/{{$register->profile_img}}"
                                                style="width: 150px; height: 150px; border-style: dashed; margin:auto;display:flex; border-radius: 90px;">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Full Name </label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{$register->name}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Email </label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{$register->email}}" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            <label for="position">User Type</label>
                                            <select class="form-control" name="category" id="category">

                                                <option value="Clerk">Clerk</option>
                                                <option value="Manager">Branch Manager</option>
                                                <option value="Owner">Owner</option>
                                            </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="email">Profile Image </label><br>
                                                <input type="file" id="myFile" name="profile_img" required onchange="previewFile()" required>
                                            </div>
                                        </div><br>
                                        <center><img id="previewImage" src="#" alt="Preview" style="display: none; width: 150px; border-style: dashed;"></center>
                                        <br>
                                        <div style="float: right;">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-md">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-md" id="btn" onclick="updateData(this)" data-link="{{ route('updateUser', $register->id) }}" data-idform="updateUser" data-btnNameChange="Updating..."><span class="nav-link-text">Update</span></button>
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