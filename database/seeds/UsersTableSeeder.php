<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'Firas Abbas';
        $email = 'firas.abb.101@gmail.com';
        $password = bcrypt('alphaomega');

        $newUser = User::where('email', $email)->first();

        if($newUser === null){
            $newUser = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
            $newUser->assignRole('admin');
        }
    }
}
