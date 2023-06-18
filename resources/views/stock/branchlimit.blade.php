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
<center><h2>List of Registered User</h2></center>
<section class="p-5">
    <div class="container" width="100px">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">
                <div class="card">
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>Sales Date</th>
                            <th>Total Sales</th>
                            <th>Branch Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($salesRecord as $data)
                    @if( $data->sales_status== "Approved" || $data->sales_status== "Request Allowed")
                    <tr id="row{{$data->id}}">

                        <td>{{ $data->branchname }}</td>
                        <td>{{ $data->salesdate }}</td>
                        <td>{{ $data->totalsales }}</td>
                        <td>{{ $data->sales_status }}</td>
                        <td style="width: 200px;">
                                <a class="btn btn-primary" role="button" href="{{ route('calculateLimitByCategory',$data->id) }}" style="color: white; width:100%; "><i class="fas fa-eye"></i>&nbsp;&nbsp;View Details</a>
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
                                        <img src="/assets/pass/{{$data->sales_img}}" width="400px">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    </tbody>
                </table></div>
            </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
