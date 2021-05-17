<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('companies')->insert([
        //     'name' => 'medkad',
        //     'address'=>'123',
        //     'contact'=>'123',
        //     'email'=>'medkad@medkad.com',
        //     'website'=>'medkad.com',
        //     'PIC_name'=>'admin',
        //     'PIC_id'=>'123',
        //     'user_id'=>'1'
        // ]);

        // DB::table('companies')->insert([
        //     'name' => 'msu',
        //     'address'=>'987',
        //     'contact'=>'987',
        //     'email'=>'msu@msu.com',
        //     'website'=>'msu.com',
        //     'PIC_name'=>'adminmsu',
        //     'PIC_id'=>'987',
        //     'user_id'=>'1'
        // ]);

         Company::create([
            'name' => 'medkad',
            'address'=>'123',
            'contact'=>'123',
            'email'=>'medkad@medkad.com',
            'website'=>'medkad.com',
            'PIC_name'=>'admin',
            'PIC_id'=>'123',
            'user_id'=>'1'
      ]);
            
        Company::create([
            'name' => 'msu',
            'address'=>'987',
            'contact'=>'987',
            'email'=>'msu@msu.com',
            'website'=>'msu.com',
            'PIC_name'=>'adminmsu',
            'PIC_id'=>'987',
            'user_id'=>'1'
       ]);
    }
}