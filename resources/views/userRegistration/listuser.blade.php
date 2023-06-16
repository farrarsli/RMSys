@extends('layouts.sideNav')

@section('content')

<center><h1>List of Registered User</h1></center>

<section class="p-5">
    <div class="container" width="100px">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">
                <div class="col-lg-2 col-md-2 col-sm-2" style="float: left;">
                    <a class="btn btn-success" style="float: right; width:100%;" role="button" href="{{ route('registeruser') }}">
                        <i class="fas fa-plus"></i>&nbsp; Add New User</a><br>
                </div><br><br><br>
                <div class="card">
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>IC Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userRecord as $data)

                        <tr id="row{{$data->id}}">

                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->category }}</td>
                            <td>{{ $data->category }}</td>
                            <td>
                                <div class="btn-group" style="float: center;">
                                <a href="{{route('updateprofile',$data->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" type="button" onclick="deleteItem(this)" data-id="{{ $data->id }}" data-name="{{ $data->name }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table></div>
            </div>
                
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function deleteItem(e) {
        let id = e.getAttribute('data-id');
        let name = e.getAttribute('data-name');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            html: "Name: " + name + "<br> You won't be able to revert this!",
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'DELETE',
                        url: '{{url("/delprofile")}}/' + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            if (data.success) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'User account has been deleted.',
                                    "success"
                                );

                                $("#row" + id).remove(); // you can add name div to remove
                            }


                        }
                    });

                }

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                // swalWithBootstrapButtons.fire(
                //     'Cancelled',
                //     'Your imaginary file is safe :)',
                //     'error'
                // );
            }
        });

    }
    
</script>