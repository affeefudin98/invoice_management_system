<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'panadol',
            'description'=>'3 papan',
            'price'=>'10',
            'user_id'=>'1'
        ]);
            
        Product::create([
            'name' => 'sabun',
            'description'=>'refill',
            'price'=>'7',
            'user_id'=>'1'
        ]);
    }
}