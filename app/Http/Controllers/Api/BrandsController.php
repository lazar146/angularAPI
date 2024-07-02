<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BrandsController extends Controller
{
    public function index()
    {

        $brands=DB::table('brands')->get();

        return response()->json([
            'status' => true,

            'brands'=>$brands,

        ]);
    }

    public function store(Request $request)
    {
        try {
            $validationData = $request->validate([
                'name'=>'required|string|max:255'
            ]);
            $table = BrandModel::create($validationData);
            return response()->json([
                'message' => 'Uspešno ažurirano!',

            ], 200);
        }
        catch (\Exception $e)
        {
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return response()->json(['error' => 'Došlo je do greške.'], 500);
        }

    }

    public function update(Request $request, string $id)
    {
        try {
            $validationData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $row = BrandModel::findOrFail($id);
            $row->update($validationData);

            return response()->json([
                'message' => 'Uspešno ažurirano!',
                'data' => $row
            ], 200);
        } catch (\Exception $e) {
            Log::error('Greška: ' . $e->getMessage());
            return response()->json(['error' => 'Došlo je do greške.'], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            $col = BrandModel::find($id);
            $col->delete();
            return response()->json([
                'message' => 'Uspešno ažurirano!',

            ], 200);
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return response()->json(['error' => 'Došlo je do greške.'], 500);
        }
    }}
