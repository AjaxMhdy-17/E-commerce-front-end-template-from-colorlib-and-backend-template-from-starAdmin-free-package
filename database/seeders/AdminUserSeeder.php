<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Admin::create([
            'name' => 'admin' , 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        for($i = 1 ; $i <= 3 ; $i++){
            Admin::create([
                'name' => 'admin'.$i , 
                'email' => 'admin'.$i.'@gmail.com',
                'password' => Hash::make('11111111')
            ]);
        }

       
    }
}
