<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        // DB::table('products')->insert([
        //     'name' => 'panadol',
        //     'description'=>'3 papan',
        //     'price'=>'10',
        //     'user_id'=>'1'
        // ]);

        // DB::table('products')->insert([
        //     'name' => 'sabun',
        //     'description'=>'refill',
        //     'price'=>'7',
        //     'user_id'=>'1'
        // ]);

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