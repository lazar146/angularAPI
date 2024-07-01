<?php

namespace Database\Seeders;

use App\Models\ImageModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'image_name' => '1',
                'model_id' =>1,

            ],[
                'image_name' => '2',
                'model_id' =>2,

            ],[
                'image_name' => '3',
                'model_id' =>3,

            ],[
                'image_name' => '4',
                'model_id' =>4,

            ],[
                'image_name' => '5',
                'model_id' =>5,

            ],[
                'image_name' => '6',
                'model_id' =>6,

            ],
            ];
        foreach ($images as $image) {
            ImageModel::create($image);
        }
    }
}
