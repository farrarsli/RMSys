@extends('layouts.sideNav')
@section('content')

<center><h1>Update User Profile</h1></center><br>
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
                                                <label for="email">Full Name </label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{$register->name}}">
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Email </label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{$register->email}}">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        
                                        <div class="form-group col-md-6">
                                                <label for="position">User Type</label>
                                                <select class="form-control" name="category" id="category">

                                                <option value="Clerk">Clerk</option>
                                                    <option value="Manager">Branch Manager</option>
                                                    <option value="Owner">Owner</option>
                                                </select>
                                            </div>

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