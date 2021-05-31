<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;


class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_Name' => Str::random(10),
            'last_Name' => Str::random(10),
            'email' => 'admin@mailinator.com',
            'password' => Hash::make('12345789'),
            'dob' => Carbon::now()->format('Y-m-d H:i:s'),
            'role' => 'Admin',
        ]);
        User::create([
            'first_Name' => Str::random(10),
            'last_Name' => Str::random(10),
            'email' => 'user@mailinator.com',
            'password' => Hash::make('12345789'),
            'dob' => Carbon::now()->format('Y-m-d H:i:s'),
            'role' => 'User',
        ]);
    }
}
