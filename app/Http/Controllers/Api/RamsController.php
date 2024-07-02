<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCheckRequest;
use App\Models\RamModel;
use App\Models\RamSpecModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RamsController extends Controller
{
    public function index()
    {

        $rams=DB::table('ram_specs')->get();

        return response()->json([
            'status' => true,

            'rams'=>$rams,

        ]);
    }

    public function store(Request $request)
    {

        try {

            $data = $request->input('name');

            RamModel::create([
                'name'=>$data
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
            $row = RamModel::find($id);
            $name = $request->input('name');
            $row->name=$name;
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

            $table = RamModel::find($id);
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
