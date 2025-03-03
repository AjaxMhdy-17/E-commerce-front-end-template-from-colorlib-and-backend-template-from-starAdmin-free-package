<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
        for($i = 1 ; $i <= 3 ; $i++){
            User::create([
                'name' => 'Admin-'.$i, 
                'email' => 'admin'.$i.'@gmail.com',
                'password' => bcrypt('11111111'),
            ]);
        }
    }
}
