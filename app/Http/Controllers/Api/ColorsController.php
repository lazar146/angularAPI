<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCheckRequest;
use App\Models\ColorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ColorsController extends Controller
{
    public function store(AdminCheckRequest $request)
    {

        try {

            $data = $request->input('value');

            ColorModel::create([
                'value'=>$data
            ]);
            return redirect()->route('showTable',['table'=>'colors'])->with('success','Uspesno!');
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Boja nije kreirana!');
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
            return redirect()->route('showTable',['table'=>'colors'])->with('success','Uspesno!');
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Boja nije kreirana!');
        }

    }
}
