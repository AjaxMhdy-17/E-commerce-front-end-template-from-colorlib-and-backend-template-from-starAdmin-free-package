<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin', 
            'slug' => 'admin',
            'user_id' => rand(1,4)
        ]);
        Role::create([
            'name' => 'author', 
            'slug' => 'author',
            'user_id' => rand(1,4)
        ]);
    }
}
