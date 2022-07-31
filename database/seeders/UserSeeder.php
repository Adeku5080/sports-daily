<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
         'name' => 'hauwa Adeku',
        'email' => "mohammed@gmail.com",
        'password' => bcrypt('Adeku1997'),
        'is_admin' => 1
    ]);
    }
}
