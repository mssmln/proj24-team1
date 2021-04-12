<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FlatSeeder::class,
            PlanSeeder::class,
            ImageSeeder::class,
            UserSeeder::class,
            ServiceSeeder::class
        ]);
    }
}
