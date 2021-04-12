<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Flat;

class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i <= 10; $i++) {
            $newFlat = new Flat();
            $newFlat->title = $faker->sentence(6);
            $newFlat->overview = $faker->text();
            $slug = Str::slug($newFlat->title);
            $sameSlug = Flat::where('slug', $slug)->first();
            $counter = 1;
            $memorySlug = $slug;
            while ($sameSlug) {
                $slug = $memorySlug . '-' . $counter;
                $sameSlug = Flat::where('slug', $slug)->first();
                $counter++;
            }//while
            $newFlat->slug = $slug;
            $newFlat->price = $faker->numberBetween(30, 200);
            $newFlat->rooms = $faker->numberBetween(1, 10);
            $newFlat->beds = $faker->numberBetween(1, 10);
            $newFlat->baths = $faker->numberBetween(1, 5);
            $newFlat->sqm = $faker->numberBetween(30, 300);
            $newFlat->address = $faker->address();
            $newFlat->lat = $faker->latitude($min = -90, $max = 90);// 77.147489
            $newFlat->lng = $faker->longitude($min = -180, $max = 180);// 86.211205
            $newFlat->flat_img = $faker->imageUrl(640, 480, 'animals', true);
            $newFlat->visibility = $faker->boolean();
            $newFlat->views = $faker->randomNumber(7, false);

            $newFlat->save();
        }//for
    }
}
