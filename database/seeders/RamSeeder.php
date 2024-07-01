<?php

namespace Database\Seeders;

use App\Models\RamModel;
use App\Models\RamSpecModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            '4',
            '6',
            '8',
            '12'
        ];

        foreach ($values as $value) {
           RamModel::create([
                'name' => $value,
            ]);
        }
    }
}
