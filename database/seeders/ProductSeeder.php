<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductModel;

class ProductSeeder extends Seeder
{/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Red Widget',
                'description' => '',
                'code' => 'R01',
                'price' => 32.95,
                'status' => 1
            
            ],
            [
                'name' => 'Green Widget',
                'description' => '',
                'code' => 'G01',
                'price' => 24.95,
                'status' => 1
            
            ],
              [
                'name' => 'Blue Widget',
                'description' => '',
                'code' => 'B01',
                'price' => 7.95,'status' => 1
            
            ],
            [
                'name' => 'white Widget',
                'description' => '',
                'code' => 'W01',
                'price' => 10.95,
                'status' => 1
            ],
        ];
  
        foreach ($products as $key => $value) {
            ProductModel::create($value);
        }
    }
}

