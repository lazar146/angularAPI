<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\FolderModel;
use App\Models\ImageModel;
use App\Models\ModelsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ImagesController extends Controller
{
    public function store(Request $request)
    {
        $model_id = $request->input('model_id');
        $image_name = $request->input('name');

        try {
            ImageModel::create([
                'image_name'=>$image_name,
                'model_id'=>$model_id,


            ]);

            return redirect()->route('showTable',['table'=>'images'])->with('success', 'Uspešno uneto!');
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return redirect()->back()->with('Error');
        }
    }



    public function update(Request $request, string $id)
    {
        $model_id = $request->input('model_id');
        $image_name = $request->input('image_name');

        try {
            $row =ImageModel::findOrFail($id);
            $row->image_name=$image_name;
            $row->model_id=$model_id;
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

            $table = ImageModel::find($id);
            $table->delete();
            return redirect()->route('showTable',['table'=>'images'])->with('success','Uspesno!');
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Nije kreiran!');
        }
    }
}
