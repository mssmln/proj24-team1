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
            UserSeeder::class,
            FlatSeeder::class,
            PlanSeeder::class,
            ImageSeeder::class,
            ServiceSeeder::class,
            MessageSeeder::class,
            AdSeeder::class
        ]);
    }
}
