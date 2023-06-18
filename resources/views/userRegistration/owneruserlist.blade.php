@extends('layouts.sideNav')
@section('content')

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
<center><h3>List of Registered User</h3></center>
<section class="p-2">
    <div class="container" width="100px">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">
                <div class="card">
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                            <th>Profile Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userRecord as $data)

                        <tr id="row{{$data->id}}">

                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->category }}</td>
                            <td>
                                <a class=" fas fa-image btn btn-secondary " data-toggle="modal" data-target="#viewPassModal{{$data->id}}" style="color: white; width:100%;"></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="viewPassModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Sales image</h5>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="justify-content-center text-center">
                                                    <img src="/assets/{{$data->profile_img}}" width="200px">
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
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