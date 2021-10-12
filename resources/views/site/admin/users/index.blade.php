@extends('site.admin.layout.app')

@section('sidebar')
    @include('site.admin.layout.sidebar')
@endsection



@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
        @include('site.admin.layout.topbar')
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                    <div id="validation-errors"></div>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">
                        <div class="col-sm-12">
                            <a href="#" class='btn btn-primary mb-2' data-toggle='modal' data-target='#createUser'>
                              Create new User
                            </a>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Users</h5>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive dt-responsive">
                                        <table id="datatable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Created at</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


@include('site.admin.users.modal')
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
    @include('site.admin.layout.footer')
    <!-- End of Footer -->

    </div>
@endsection

@push('js')

    <script>
        $(document).ready(function(){
var user_id
              $('#datatable').DataTable({

                processing: true,
                serverSide: true,
                ajax: '{{route('users.index')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'options', name: 'options', orderable: true, searchable: false},
                ]
            });

            $(document).on('submit','#user_form',function(e){
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
                        $('#datatable').DataTable().draw(false);

                        $('#validation-errors').append('<div class="alert alert-success">Saved Successfully</div>');
                        setTimeout(function(){
                            $('#validation-errors').html('');
                        },2000)

                    },error: function (xhr) {
                        $('.modal').modal('hide');
                        $('#validation-errors').html('');
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');

                            setTimeout(function(){
                                $('#validation-errors').html('');
                            },2000)
                        });
                    },
                })
            })


            $('#datatable').on('click','.btn-delete[data-url]',function(e){
                e.preventDefault();

                var url = $(this).data('url');
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: {method: '_DELETE', submit: true},
                    success: function (response) {

                        $('#datatable').DataTable().draw(false);
                        $('#validation-errors').append('<div class="alert alert-success">Deleted Successfully</div>');
                        setTimeout(function(){
                            $('#validation-errors').html('');
                        },2000)



                    },
                })
            })


            $('#datatable').on('click','#btn-edit',function(e){
                e.preventDefault();
                var id = $(this).data('id');
                    user_id=id
                var email = $(this).data('email');
                $("#user_id").val(id);
                $("#email").val(email)

            })

            $(document).on('submit','#user_form_update',function(e){
                e.preventDefault();
               var url ='{{route('users.update','id')}}'

                url = url.replace('id',user_id)

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
                        $('#datatable').DataTable().draw(false);

                        $('#validation-errors').append('<div class="alert alert-success">Updated Successfully</div>');
                        setTimeout(function(){
                            $('#validation-errors').html('');
                        },2000)

                    },error: function (xhr) {
                        $('.modal').modal('hide');
                        $('#validation-errors').html('');
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');

                            setTimeout(function(){
                                $('#validation-errors').html('');
                            },2000)
                        });
                    },
                })
            })





        });
    </script>

@endpush
