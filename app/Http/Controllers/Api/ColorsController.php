<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCheckRequest;
use App\Models\ColorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ColorsController extends Controller
{
    public function store(Request $request)
    {

        try {

            $data = $request->input('value');

            ColorModel::create([
                'value'=>$data
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
            $row = ColorModel::find($id);
            $name = $request->input('value');
            $row->value=$name;
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

            $table = ColorModel::find($id);
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
