<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Basic',
                'price' => '2.99',
                'duration' => '24'
            ],
            [
                'name' => 'Medium',
                'price' => '5.99',
                'duration' => '72'
            ],
            [
                'name' => 'Advanced',
                'price' => '9.99',
                'duration' => '144'
            ]
        ];

        foreach ($plans as $plan) {
            $newPlan = new Plan();
            $newPlan->name = $plan['name'];
            $newPlan->price = $plan['price'];
            $newPlan->duration = $plan['duration'];
            $newPlan->save();
        }
    }
}
