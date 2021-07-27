<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
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
            'name'    => "ayse",
            'email'    => "ayse@hotmail.com",
            'password'   => md5("123"),
            'remember_token' =>  str::random(10),
        ]);
    }
}
