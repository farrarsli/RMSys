@extends('layouts.sideNav')

@section('content')

<center><h2>List of Registered User</h2></center>
<section class="p-5">
    <div class="container" width="100px">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">
                <div class="col-lg-2 col-md-2 col-sm-2" style="float: left;">
                    <a class="btn btn-success" style="float: right; width:100%;" role="button" href="{{ route('registeruser') }}">
                        <i class="fas fa-plus"></i>&nbsp; Add New User</a> 
                        <script>
                            // to search the REPAIR FORM 
                            $(document).ready(function() {
                                $('#dataTable').DataTable({
                                    "order": [
                                        [0, "asc"]
                                    ],
                                    "language": {
                                        search: '<i class="fa fa-search" aria-hidden="true"></i>',
                                        searchPlaceholder: 'Search By Customer Name'
                                    }
                                });

                                // filter REPAIR FORM
                                $('.dataTables_filter input[type="search"]').css({
                                    'width': '300px',
                                    'display': 'inline-block',
                                    'font-size': '15px',
                                    'font-weight': '400'
                                });
                            });
                        </script>
                        <br>
                </div><br><br><br>
                <div class="card">
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Profile Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userRecord as $data)

                        <tr id="row{{$data->id}}">

                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->category }}</td>
                            <td>
                                <a class=" fas fa-image btn btn-secondary " data-toggle="modal" data-target="#viewPassModal" style="color: white; width:100%;"></a>
                            </td>
                            <td>
                                <div class="btn-group" style="float: center;">
                                <a href="{{route('updateprofile',$data->id)}}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger" type="button" onclick="deleteItem(this)" data-id="{{ $data->id }}" data-name="{{ $data->name }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="viewPassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Sales image</h5>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="justify-content-center text-center">
                                                    <img src="/assets/pass/{{$data->profile_img}}" width="400px">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
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