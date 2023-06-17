@extends('layouts.sideNav')
@section('content')

@foreach($salesRecord as $data)

@if( $data->sales_status== "Rejected" || $data->sales_status== "Approved")

<div class="card">
    <div class="card-body">
        <center>
            <h2>You are not allowed to request yet</h2><br>
            <h4>You are required to update your <strong>weekly sales</strong> first before proceed to <strong>Produt Request</strong>.</h4>
        </center>
    </div>
</div>

@endif

@if($data->sales_status== "Request Allowed")

<center>
    <h2>List of Product</h2><br>
</center>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Detail</th>
                    <th>Stock Available</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productRecord as $data)

                <tr id="row{{$data->id}}">

                    <td>{{ $data->productname }}</td>
                    <td>{{ $data->productdetail }}</td>
                    <td>{{ $data->stock }}</td>
                    <td>
                        <div class="btn-group">
                        <a class="btn btn-primary" role="button" href="{{ route('requestproductdetails',$data->id) }}" style="color: white; width:100%; "><i class="fas fa-eye"></i>&nbsp;View Details</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endif
@endforeach
@endsection