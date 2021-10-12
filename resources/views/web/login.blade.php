<div class="modal" id="login" tabindex="-1" role="dialog" style="margin-top: 60px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.login')}}" method="POST" id="user_login_form">
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
                <button type="submit" form="user_login_form" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="register" tabindex="-1" role="dialog" style="margin-top: 60px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">sign up</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.register')}}" method="POST" id="user_register_form">
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
                <button type="submit" form="user_register_form" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>






