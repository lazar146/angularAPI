<?php

namespace Database\Seeders;

use App\Models\ModelsModel;
use App\Models\ModelSpecificationModel;
use App\Models\PriceModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [
            [
                'model_id' => 1,
                'price' => '350',
                'old_price' => '400',
            ],
            [
                'model_id' => 3,
                'price' => '120',
                'old_price' => '0',
            ],
            [
                'model_id' =>4,
                'price' => '400',
                'old_price' => '550',
            ],
            [
                'model_id' => 2,
                'price' => '570',
                'old_price' => '600',
            ],
            [
                'model_id' => 5,
                'price' => '680',
                'old_price' => '700',
            ],
            [
                'model_id' => 6,
                'price' => '200',
                'old_price' => '0',
            ],
        ];

        foreach ($prices as $price){
            PriceModel::create($price);
        }
    }
}
