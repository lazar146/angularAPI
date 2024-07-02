<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCheckRequest;
use App\Models\PriceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PriceController extends Controller
{
    public function store(Request $request)
    {

        try {
            $msc_id = $request->input('model_id');
            $price = $request->input('price');
            $old_price = $request->input('old_price');
            PriceModel::create([
                'model_id'=>$msc_id,
                'price'=>$price,
                'old_price'=>$old_price
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

    public function update(Request $request, string $id)
    {

        try {
//
            $row = PriceModel::find($id);
            $model  =$request->input('model_id');
            $price = $request->input('price');
            $oldPrice = $request->input('old_price');
            $updated_at=$request->input('updated_at');
            $row->model_id=$model;
            $row->price=$price;
            $row->old_price=$oldPrice;
            $row->updated_at = $updated_at;
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

    public function destroy(string $id)
    {
        try {

            $table = PriceModel::find($id);
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
