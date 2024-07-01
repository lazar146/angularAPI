<?php

namespace Database\Seeders;

use App\Models\BrandModel;
use App\Models\ColorModel;
use App\Models\ModelsModel;
use App\Models\RamModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            [
                'name' => 'Iphone 12',
                'description' => 'test',
                'brand_id' => BrandModel::where('name', 'Apple')->value('id'),
                'ram_id' => RamModel::where('name','4')->value('id'),
                'color_id' => ColorModel::where('value','White')->value('id'),

            ],[
                'name' => 'Iphone 7 Plus',
                'description' => 'test',
                'brand_id' => BrandModel::where('name', 'Apple')->value('id'),
                'ram_id' => RamModel::where('name','6')->value('id'),
                'color_id' => ColorModel::where('value','Pink')->value('id'),

            ],[
                'name' => 'Galaxy S20 Ultra',
                'description' => 'test',
                'brand_id' => BrandModel::where('name', 'Samsung')->value('id'),
                'ram_id' => RamModel::where('name','12')->value('id'),
                'color_id' => ColorModel::where('value','Black')->value('id'),

            ],[
                'name' => 'Iphone 13',
                'description' => 'test',
                'brand_id' => BrandModel::where('name', 'Apple')->value('id'),
                'ram_id' => RamModel::where('name','8')->value('id'),
                'color_id' => ColorModel::where('value','Black')->value('id'),

            ],[
                'name' => 'Iphone 13 Pro',
                'description' => 'test',
                'brand_id' => BrandModel::where('name', 'Apple')->value('id'),
                'ram_id' => RamModel::where('name','4')->value('id'),
                'color_id' => ColorModel::where('value','Black')->value('id'),

            ],[
                'name' => 'Redmi Note 12',
                'description' => 'test',
                'brand_id' => BrandModel::where('name', 'Xiaomi')->value('id'),
                'ram_id' => RamModel::where('name','6')->value('id'),
                'color_id' => ColorModel::where('value','Blue')->value('id'),

            ],
            ];

        foreach ($models as $modelData) {
            ModelsModel::create($modelData);
        }
    }
}
