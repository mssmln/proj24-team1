<?php

use Illuminate\Database\Seeder;
use App\Message;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 10; $i++){
            $newMessage = new Message();
            $newMessage->email = $faker->email();
            $newMessage->message = $faker->text();
            $newMessage->save();
        }
    }
}
