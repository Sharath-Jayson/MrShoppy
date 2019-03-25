<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sharath',
            'password'=> bcrypt('sarath12'),
            'email' => 'jaisarat@gmail.com',
            'admin' => 1,
            'avatar' => 'avatars/avatar.jpg'
        ]);
    }
}
