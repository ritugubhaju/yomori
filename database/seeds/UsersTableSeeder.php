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
        $user=User::create([
            'name'=>'SuperAdmin',
            'email'=>'admin@yomori.com',
            'password'=>Hash::make('admin@yomori'),
        ]);
    }
}
