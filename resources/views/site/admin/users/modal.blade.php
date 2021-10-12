<div class="modal" id="createUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.store')}}" method="POST" id="user_form">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>

                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="user_form" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>



<div class="modal" id="updateUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="user_form_update">
                    @csrf
                    <input type="hidden" id="user_id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>


                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="user_form_update" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
