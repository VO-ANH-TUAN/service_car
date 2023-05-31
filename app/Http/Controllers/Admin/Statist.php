<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Statist extends Controller
{
    public function view(){
        $data =DB::table('carts',) ->join('products', 'products.id', '=', 'carts.product_id')->select('carts.*','products.*')->where('carts.created_at','like','2023'.'%')->get();

        return view('admin.statist.ByYear',['title'=>'Thống kê theo năm',
            'statists'=>$data
          ]);
    }

//
}
