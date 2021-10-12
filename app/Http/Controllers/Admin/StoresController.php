<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class StoresController extends Controller
{
    public function index(Request $request){



        if($request->ajax()){

            $users = User::where('role','=','store');

            return DataTables::of($users)

                ->editColumn('options', function ($query) {
                    $html = '<a href ="#" data-toggle="modal" data-target="#updateStore"
                class="btn mr-1 ml-1 waves-effect waves-light btn-success  text-center" id="btn-edit" title="Edit"
                data-id="' . $query->id . '" data-email="' . $query->email . '"

                >Edit</a>';
                    $html .= "<a href='#' class='btn mr-1 ml-1 btn-danger btn-delete datatable-delete'  data-url='" . route('stores.delete', $query->id) . "'>Delete</a>";

                    return $html;
                })
                ->rawColumns([
                    'options',
                ])
                ->make([true]);
        }

        return view('site.admin.stores.index');

    }


    public function store(Request $request){

        $request->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);


        $user = User::create([
            'role'=>'store',
        ]);

        Store::create([
            'user_id'=>$user->id,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
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

        Store::where('user_id',$user->id)->delete();

        $user->delete();

        return response()->json('success');


    }










}
