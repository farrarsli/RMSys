@extends('layouts.sideNav')

@section('content')

<center>
    <h3>List of Registered Product</h3>
</center>
<section class="p-2">
    <div class="container" width="100px">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">
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
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Detail</th>
                                    <th>Stock Available</th>
                                    <th>Product Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productRecord as $data)
                                <tr id="row{{$data->id}}">
                                    <td>{{ $data->productname }}</td>
                                    <td>{{ $data->productdetail }}</td>
                                    <td>{{ $data->stock }}</td>
                                    <td>
                                        <a class="fas fa-image btn btn-secondary" data-toggle="modal" data-target="#viewPassModal{{$data->id}}" style="color: white; width: 100%;"></a>
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
                                                    <img src="/assets/{{$data->product_img}}" width="400px">
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
                        </table>
                    </div>
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
                        url: '{{url("/deleteProduct")}}/' + id,
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