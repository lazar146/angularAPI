<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCheckRequest;
use App\Models\ModelsModel;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = DB::table('models')->get();



        $product =DB::table('models')
            ->join('images','images.model_id','=','models.id')
            ->join('price','price.model_id','=','models.id')
            ->join('ram_specs','ram_specs.id','=','models.ram_id')
            ->join('colors','colors.id','=','color_id')
            ->join('brands','brands.id','=','brand_id')
            ->select('models.*','price.*','ram_specs.name as ramMemory','images.image_name as imageName','brands.name as brandName','colors.value as Color')
            ->get();




        return response()->json([
            'status' => true,
            'product' => $product,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            $name = $request->input('name');
            $des = $request->input('description');
            $brend = $request->input('brand_id');
            $ram = $request->input('ram_id');
            $color = $request->input('color_id');


            ModelsModel::create([
                'name'=>$name,
                'description'=>$des,
                'brand_id'=>$brend,
                'ram_id'=>$ram,
                'color_id'=>$color,


            ]);

            return response()->json([
                'message' => 'Uspešno ažurirano!',

            ], 200);
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return response()->json(['error' => 'Došlo je do greške.'], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $row = ModelsModel::find($id);
            $name = $request->input('name');
            $des = $request->input('description');
            $brend = $request->input('brand_id');
            $ram = $request->input('ram_id');
            $color = $request->input('color_id');


            $row->name = $name;
            $row->description = $des;
            $row->brand_id = $brend;
            $row->ram_id = $ram;
            $row->color_id = $color;


            $row->save();
            return response()->json([
                'message' => 'Uspešno ažurirano!',
                'data' => $row
            ], 200);
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return response()->json(['error' => 'Došlo je do greške.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $table = ModelsModel::find($id);
            $table->delete();
            return response()->json([
                'message' => 'Uspešno ažurirano!',

            ], 200);
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return response()->json(['error' => 'Došlo je do greške.'], 500);
        }

    }
}
