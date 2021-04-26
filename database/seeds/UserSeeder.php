<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {

        $user = [
            [
                'name' => 'user',
                'surname' => 'user',
                'email' => 'user@mail.com',
                'password' => '$2y$10$7D9EUbFDAwBWi1E2kno02.t2AYtgOuTg5ol1Bbe06jY14ng7yH7wa',  //password
            ]
        ];

        foreach ($user as $value) {
            $newUser = new User();
            $newUser->name = $value['name'];
            $newUser->surname = $value['surname'];
            $newUser->email = $value['email'];
            $newUser->password = $value['password'];
            $newUser->save();
        }

        // for ($i = 0; $i <= 10; $i++) {

        //     $newUser = new User();
           
        //     $newUser->name = $faker->name();
        //     $newUser->surname = $faker->lastname();
        //     $newUser->email = $faker->email();
        //     $newUser->password = $faker->password();
        //     $newUser->date_of_birth = $faker->date();

        //     $newUser->save();
        // }

    }

}
