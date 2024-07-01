<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $models = DB::table('models')->get();



        $product =DB::table('models')
            ->join('images','images.model_id','=','id')
            ->join('price','price.model_id','=','id')
            ->join('ram_specs','ram_specs.id','=','ram_id')
            ->join('colors','colors.id','=','color_id')
            ->join('brands','brands.id','=','brand_id')
            ->select('models.*','price.*','images.image_name','brands.name','colors.value')
            ->get();


        return response()->json([
            'status' => true,
            'product' => $product,
        ]);



    }
}
