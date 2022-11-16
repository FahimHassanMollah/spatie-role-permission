<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::where('email','fahim@gmail,com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "fahim hassan";
            $user->email = "fahim@gmail.com";
            $user->password = Hash::make('admin@123');
            $user->save();
        }

    }
}
