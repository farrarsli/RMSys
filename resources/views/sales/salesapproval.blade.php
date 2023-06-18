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
<center>
    <h2>Sales Approval</h2>
</center><br>

<div class="card">
<div class="card-body">
    <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
            <tr>
                <th>Branch</th>
                <th>Sales Date</th>
                <th>Total Sales</th>
                <th>Status</th>
                <th>    </th>
            </tr>
        </thead>
        <tbody>

        @foreach($salesRecord as $data)
    <tr id="row{{$data->id}}">
        <td>{{ $data->branchname }}</td>
        <td>{{ $data->salesdate }}</td>
        <td>{{ $data->totalsales }}</td>
        <td>{{ $data->sales_status }}</td>
        <td>
            <a class="btn btn-primary" data-toggle="modal" data-target="#viewPassModal{{$data->id}}" style="color: white; width: 100%;">View</a>
        </td>
    </tr>
    <div class="modal fade" id="viewPassModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Sales Evidence Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center text-center">
                        <img src="/assets/{{$data->sales_img}}" width="200px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if( $data->sales_status == "Pending")
                        <!--approve registration-->
                        <a class="btn btn-success" href="{{route('approval', $data->id)}}">Approve</a>
                        <!--reject registration-->
                        <a class="btn btn-danger" href="{{route('reject', $data->id)}}">Reject</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach

        </tbody>
    </table>
</div>
</div>



@endsection

