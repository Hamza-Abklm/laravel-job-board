<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
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
            'name' => 'Admin User',
            'email' => 'amazing@boss.com',
            'role'=> 'admin',
            'password'=> Hash::make('12312312'),
        ]);

         User::create([
            'name' => 'editor man',
            'email' => 'man@boss.com',
            'role'=> 'editor',
            'password'=> Hash::make('12312312'),
        ]);
         User::create([
            'name' => 'editor woman',
            'email' => 'woman@boss.com',
            'role'=> 'editor',
            'password'=> Hash::make('12312312'),
        ]);
    }
}
