<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){

            $users = User::where('role','=','user');

            return DataTables::of($users)

                ->editColumn('options', function ($query) {
                    $html = '<a href ="#" data-toggle="modal" data-target="#updateUser"
                class="btn mr-1 ml-1 waves-effect waves-light btn-success  text-center" id="btn-edit" title="Edit"
                data-id="' . $query->id . '" data-email="' . $query->email . '"

                >Edit</a>';
                    $html .= "<a href='#' class='btn mr-1 ml-1 btn-danger btn-delete datatable-delete'  data-url='" . route('users.delete', $query->id) . "'>Delete</a>";

                    return $html;
                })
                ->rawColumns([
                    'options',
                ])
                ->make([true]);
        }

        return view('site.admin.users.index');

    }


    public function store(Request $request){

        $request->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);


        User::create([
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'user',
            'email_verified_at'=>Carbon::now()
        ]);
      return response()->json('success');
    }

    public function update(Request $request, User $user){

        $request->validate([
            'email'=>'required|email|unique:users,email,'. $user->id,
        ]);
        $user->update([
            'email'=>$request->email,
        ]);

        return response()->json('success');


    }

    public function delete(User $user){

        $user->delete();

        return response()->json('success');


    }





}
