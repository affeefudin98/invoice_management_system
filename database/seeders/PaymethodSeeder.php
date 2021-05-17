<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Paymethod;

class PaymethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('paymethods')->insert([
        //     'bank_name' => 'maybank',
        //     'bank_no'=>'123',
        //     'method'=>'bank-in',
        //     'user_id'=>'1'
        // ]);

        // DB::table('paymethods')->insert([
        //     'bank_name' => 'bank islam',
        //     'bank_no'=>'987',
        //     'method'=>'cheque',
        //     'user_id'=>'1'
        // ]);
        
        Paymethod::create([
            'bank_name' => 'maybank',
            'bank_no'=>'123',
            'method'=>'bank-in',
            'user_id'=>'1'
        ]);
            
        Paymethod::create([
            'bank_name' => 'bank islam',
            'bank_no'=>'987',
            'method'=>'cheque',
            'user_id'=>'1'
        ]);
    }
}