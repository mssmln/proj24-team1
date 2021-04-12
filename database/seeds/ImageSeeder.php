<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Image;
use App\User;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i <= 10; $i++) {
            $newImage = new Image();
            $newImage->path = $faker->imageUrl(640, 480, 'animals', true);
            $userCount = count(User::all()->toArray());
            $newImage->flat_id = rand(1, $userCount);
            $newImage->save();
        }
    }
}
