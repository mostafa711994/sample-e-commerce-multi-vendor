<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('site.admin.login');
    }

    public function doLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',

        ]);
        $user = User::where('email',$request->email)->where('role','admin')->first();

        if(isset($user)){

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

                return redirect(route('admin.index'));

            }else{

                Session::flash('error','Email or Password Not Correct');
                return redirect(route('admin.login'));
            }


        }
    }


    public function logout(){
        Auth::logout();
        return redirect(route('admin.login'));
    }


    // Store Vendor

    public function storeLogin(){
        return view('site.store.login');
    }

public function storeDoLogin(Request $request){




    $request->validate([
        'email'=>'required',
        'password'=>'required',

    ]);

    $store = Store::where('email',$request->email)->first();

    if(isset($store)){

        if(Auth::guard('stores')->attempt(['email'=>$request->email,'password'=>$request->password])){

            return redirect(route('store.index'));

        }else{

            Session::flash('error','Email or Password Not Correct');
            return redirect(route('store.login'));
        }


    }else{
        Session::flash('error','Account Not Found');

        return redirect(route('store.login'));

    }
}


    public function storeLogout(){
        Auth::logout();
        return redirect(route('store.login'));
    }



}
