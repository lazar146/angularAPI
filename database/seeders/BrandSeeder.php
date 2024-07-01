<?php

namespace Database\Seeders;

use App\Models\BrandModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Samsung',
            'Apple',
            'Huawei',
            'Xiaomi',
        ];

        foreach ($brands as $brend) {
            BrandModel::create([
                'name' => $brend,
            ]);
        }
    }
}
