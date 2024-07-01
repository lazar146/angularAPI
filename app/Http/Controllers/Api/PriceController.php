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
            $msc_id = $request->input('id');
            $price = $request->input('price');
            $old_price = $request->input('oldPrice');
            PriceModel::create([
                'model_id'=>$msc_id,
                'price'=>$price,
                'old_price'=>$old_price
            ]);
            return redirect()->route('showTable',['table'=>'price'])->with('success','Uspesno!');
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Nije kreiran!');
        }

    }

    public function update(Request $request, string $id)
    {

        try {
//
            $row = PriceModel::find($id);
            $price = $request->input('price');
            $oldPrice = $request->input('oldPrice');

            $row->price=$price;
            $row->old_price=$oldPrice;
            $row->save();
            return redirect()->route('showTable',['table'=>'price'])->with('success','Uspesno!');
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Nije kreiran!');
        }
    }

    public function destroy(string $id)
    {
        try {

            $table = PriceModel::find($id);
            $table->delete();
            return redirect()->route('showTable',['table'=>'price'])->with('success','Uspesno!');
        }
        catch (\Exception $e){
            Log::error('Greška prilikom izvršavanja: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Nije kreiran!');
        }

    }
}
