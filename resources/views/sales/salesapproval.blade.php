@extends('layouts.sideNav')
@section('content')

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
                    <a class="btn btn-primary " data-toggle="modal" data-target="#viewPassModal" style="color: white; width:100%;">View</a>
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
                            @if( $data->sales_status== "Pending")
                                    <!--approve registration-->
                                    <a class="btn btn-success" href="{{route('approval',$data->id)}}">Approve</a>
                                    <!--reject registration-->
                                    <a class="btn btn-danger" href="{{route('reject',$data->id)}}">Reject</a>
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







