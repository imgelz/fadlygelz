<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' =>  'Muhammad Fadly' ,
            'email' =>  'muhammadfadly@gmail.com' ,
            'password' =>  bcrypt('06032003')
        ]);

        App\User::create([
            'name' =>  'Fadly Gelz' ,
            'email' =>  'usergelz633@gmail.com' ,
            'password' =>  bcrypt('06032003')
        ]);
    }
}
