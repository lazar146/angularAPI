<?php

namespace Database\Seeders;

use App\Models\ColorModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['Black', 'Blue', 'White','Pink'];


        foreach ($colors as $value){
            ColorModel::create([
                'value'=>$value
            ]);
        }
    }
}
