<?php

namespace App\Http\Controllers\web;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
           'email'=>'required',
           'password'=>'required',

        ]);


        $store = Store::where('email',$request->email)->first();

        if(isset($store)){

            if(Auth::guard('stores')->attempt(['email'=>$request->email,'password'=>$request->password])){

                return redirect(route('store.index'));

            }else{
               $session =  Session::flash('error','Email or Password Not Correct');
                return redirect(route('home'))->with($session);
            }


        }else{
            $session = Session::flash('error','Account Not Found');

            return redirect(route('home'))->with($session);

        }

    }

    public function register(Request $request){



         $request->validate([
             'email'=>'required|email|unique:stores',
             'password'=>'required'

        ]);




        $store = Store::where('email',$request->email)->first();

        if(!isset($store)){

           $user =  User::create([
                'role'=>'store'

            ]);

           Store::create([
               'user_id'=>$user->id,
               'email'=>$request->email,
               'password'=>bcrypt($request->password),
           ]);

            return redirect(route('store.index'));

        }else{

            return redirect(route('home'));

        }

    }


}
