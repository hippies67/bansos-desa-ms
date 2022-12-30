<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nama_lengkap = "admin";
        $user->username = "admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('password'); 
        $user->save();
    }
}
