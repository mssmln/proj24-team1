<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 2; $i++){
            $newMessage = new Message();

            $userMessage = count(Message::all()->toArray());
            $newMessage->flat_id = 1;
            $newMessage->email = $faker->email();
            $newMessage->message = $faker->text();
            $newMessage->save();
        }
    }
}
