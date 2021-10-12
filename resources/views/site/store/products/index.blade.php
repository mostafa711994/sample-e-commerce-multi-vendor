@extends('site.store.layout.app')

@section('sidebar')
    @include('site.store.layout.sidebar')
@endsection



@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
        @include('site.store.layout.topbar')
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div id="products_validation-errors"></div>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Store</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <div class="col-sm-12">
                        <a href="#" class='btn btn-primary mb-2' data-toggle='modal' data-target='#createProduct'>
                            Create new Product
                        </a>
                        <div class="card">
                            <div class="card-header">
                                <h5>Products</h5>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive dt-responsive">
                                    <table id="products_datatable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>price</th>

                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->
@include('site.store.products.modal')
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
    @include('site.store.layout.footer')
    <!-- End of Footer -->

    </div>
@endsection
@push('js')

    <script>
        $(document).ready(function(){

            $("#products_datatable").DataTable({

                processing: true,
                serverSide: true,
                ajax: '{{route('products.index')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                ]
            });

            $(document).on('submit','#product_form',function(e){
                e.preventDefault();
                var url = $(this).attr('action')

                $.ajax({
                    url:url,
                    data:new FormData(this),
                    dataType:'json',
                    type:'POST',
                    cache       : false,
                    contentType : false,
                    processData : false,
                    success:function (res) {
                        $('.modal').modal('hide');
                        $('#products_datatable').DataTable().draw(false);

                        $('#products_validation-errors').append('<div class="alert alert-success">Saved Successfully</div>');
                        setTimeout(function(){
                            $('#products_validation-errors').html('');
                        },2000)

                    },error: function (xhr) {
                        $('.modal').modal('hide');
                        $('#products_validation-errors').html('');
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#products_validation-errors').append('<div class="alert alert-danger">'+value+'</div>');

                            setTimeout(function(){
                                $('#products_validation-errors').html('');
                            },2000)
                        });
                    },
                })
            })







        });
    </script>

@endpush
