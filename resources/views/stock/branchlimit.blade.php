@extends('layouts.sideNav')
@section('content')

<center>
    <h2>Branch Limit</h2>
</center><br>

<div class="card">
<div class="card-body">
    
    <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
            <tr>
                <th>Branch</th>
                <th>Sales Date</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>

            @foreach($salesRecord as $data)
            @if( $data->sales_status== "Approved")
            <tr id="row{{$data->id}}">

                <td>{{ $data->branchname }}</td>
                <td>{{ $data->salesdate }}</td>
                <td>{{ $data->totalsales }}</td>
                <td style="width: 200px;">
                        <a class="btn btn-primary" role="button" href="{{ route('calculateLimitByCategory',$data->id) }}" style="color: white; width:100%; "><i class="fas fa-eye"></i>&nbsp;View Details</a>
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
    </table>
</div>
</div>

@endsection

