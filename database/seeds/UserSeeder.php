<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin.01@gmail.com',
            'password' => Hash::make('pippo123'),
        ]);

        for ($i = 0; $i < 9; $i++) {
            $user = new User();
            $name = $faker->firstName();
            $lastName = $faker->lastName();
            $user->name = "$name $lastName";
            $user->email = strtolower($name) . strtolower($lastName) . '@gmail.com';
            $user->password = Hash::make($faker->password());

            $user->save();
        }
    }
}
