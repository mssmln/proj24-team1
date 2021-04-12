<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Wi-Fi',
            ],
            [
                'name' => 'Parking',
            ],
            [
                'name' => 'Swimming Pool',
            ],
            [
                'name' => 'Concierge',
            ],
            [
                'name' => 'Sauna',
            ],
            [
                'name' => 'Seaview',
            ]
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service['name'];
            $newService->save();
        }
    }
}
