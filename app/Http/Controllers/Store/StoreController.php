<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;

class StoreController extends Controller
{
    public function index(){
        return view('site.store.index');
    }

    public function products(){

        if(request()->ajax()){

            $products = Product::orderBY('id','desc');

            return DataTables::of($products)->make([true]);
        }


        return view('site.store.products.index');

    }

    public function storeProduct(Request $request){


        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);

        return response()->json('success');

    }


}
