<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Image;

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
            $newImage->save();
        }
    }
}
