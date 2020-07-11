<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
        	'name' => 'Mario',
            'email'=> 'mcampos@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);

        User::create([
        	'name' => 'Karina',
            'email'=> 'karina@gmail.com',
            'password' => bcrypt('321321')
        ]);
    }
}
