<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

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
        user::insert([

            [
                'first_name' => 'New user',
                'last_name' => 'last name',
                'email' => 'user@gmail.com',
                'phone' => 01700000000,
                'password' =>Hash::make('password'),
                'role_id' => 1,

               ],

         [
            'first_name'=>'super',
            'last_name'=>'admin',
            'email'=>'superadmin@gmail.com',
            'password'=>Hash::make('12345'),
            'phone'=>'01933518971',
            'role_id'=>1
         ]
            ]);
    }
}
