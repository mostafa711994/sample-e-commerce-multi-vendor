@if( \Illuminate\Support\Facades\Session::has("success") )
    <div class="alert alert-success" role="alert">
        <button class="close" data-dismiss="alert"></button>
        {{ \Illuminate\Support\Facades\Session::get("success") }}
    </div>
@endif

@if( \Illuminate\Support\Facades\Session::has("error") )
    <div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert"></button>
        {{ \Illuminate\Support\Facades\Session::get("error") }}
    </div>
@endif
