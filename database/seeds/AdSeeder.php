<?php

use Illuminate\Database\Seeder;
use App\Ad;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'flat_id' => '1',
                'plan_id' => '1',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("1 days")),
            ],
            [
                'flat_id' => '2',
                'plan_id' => '1',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("1 days")),
            ],
            [
                'flat_id' => '3',
                'plan_id' => '1',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("1 days")),
            ],
            [
                'flat_id' => '4',
                'plan_id' => '1',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("1 days")),
            ],
            [
                'flat_id' => '5',
                'plan_id' => '3',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("6 days")),
            ],
            [
                'flat_id' => '6',
                'plan_id' => '3',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("6 days")),
            ],
            [
                'flat_id' => '7',
                'plan_id' => '3',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("6 days")),
            ],
            [
                'flat_id' => '8',
                'plan_id' => '3',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("6 days")),
            ],
            [
                'flat_id' => '9',
                'plan_id' => '3',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("6 days")),
            ],
            [
                'flat_id' => '10',
                'plan_id' => '3',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("6 days")),
            ],
            [
                'flat_id' => '11',
                'plan_id' => '3',
                'expired_date' => date_add(date_create( date('Y-m-d H:i:s') ),date_interval_create_from_date_string("6 days")),
            ],
        ];

        foreach ($sponsors as $sponsor) {
            $newAd = new Ad();
            $newAd->flat_id = $sponsor['flat_id'];
            $newAd->plan_id = $sponsor['plan_id'];
            $newAd->expired_date = $sponsor['expired_date'];
            $newAd->save();
        }
    }
}
