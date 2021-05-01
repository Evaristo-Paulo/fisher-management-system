<?php

use App\User;
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
            'name' => 'Evaristo Paulo',
            'email' => 'root@gmail.com',
            'photo' => 'default.png',
            'gender_id' => 1,
            'password' => Hash::make('root')
        ]);

        User::create([
            'name' => 'Etelvina Catenda',
            'email' => 'user@gmail.com',
            'photo' => 'default.png',
            'gender_id' => 2,
            'password' => Hash::make('user')
        ]);
    }
}
