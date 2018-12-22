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
            'user_group_id' => 1,
            'first_name' => 'Hari',
            'last_name' => 'Setiawan',
            'email' => 'hari@kudubisa.com',
            'password' => Hash::make('password'),
            'address' => 'Yogyakarta',
            'phone' => '0812324324',
            'photo' => null
        ]);
    }
}
