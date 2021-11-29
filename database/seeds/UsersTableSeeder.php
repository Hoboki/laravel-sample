<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        App\User::create([
            'name' => 'pro_test',
            'email' => 'test@example.com',
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10)
        ]);

        factory(User::class, 2)->create();
    }
}
