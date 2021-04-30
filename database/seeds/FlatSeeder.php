<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Flat;
use App\User;

class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(Faker $faker)
    {
        $flat_seed = [
            [
                'user_id' => '1',
                'title' => 'Piccolo appartamento in centro molto rilassante',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'piccolo-appartamento-in-centro-molto-rilassante',
                'price' => '55',
                'rooms' => '4',
                'beds' => '4',
                'baths' => '2',
                'sqm' => '70',
                'address' => 'Via Marco Polo 3, 00034 Colleferro',
                'city' => 'Roma',
                'lat' => '41.73117',
                'lng' => '13.01289',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '243',
            ],
            [
                'user_id' => '1',
                'title' => 'Stimolante appartamento con grande vista',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'stimolante-appartamento-con-grande-vista',
                'price' => '72',
                'rooms' => '5',
                'beds' => '6',
                'baths' => '3',
                'sqm' => '140',
                'address' => 'Via Oriana Fallaci 5, 00034 Colleferro',
                'city' => 'Roma',
                'lat' => '41.7323',
                'lng' => '13.01316',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '273',
            ],
            [
                'user_id' => '1',
                'title' => 'Converge nel borgo, regna sovrano il paesaggio attorno',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'converge-nel-borgo,-regna-sovrano-il-paesaggio-attorno',
                'price' => '33',
                'rooms' => '2',
                'beds' => '2',
                'baths' => '1',
                'sqm' => '51',
                'address' => 'Via Cristoforo Colombo 1, 00034 Colleferro',
                'city' => 'Roma',
                'lat' => '41.73105',
                'lng' => '13.01055',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '2343',
            ],
            [
                'user_id' => '1',
                'title' => 'Non monotono monolocale con motoparcheggio',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'non-monotono-monolocale-con-motoparcheggio',
                'price' => '40',
                'rooms' => '1',
                'beds' => '1',
                'baths' => '1',
                'sqm' => '44',
                'address' => 'Via Giuseppe Verdi 13, 00034 Colleferro',
                'city' => 'Roma',
                'lat' => '41.73195',
                'lng' => '13.00929',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '188',
            ],
            [
                'user_id' => '1',
                'title' => 'Lussuosa bifamiliare con grande piscina esterna e parcheggio',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'lussuosa-bifamiliare-con-grande-piscina-esterna-e-parcheggio',
                'price' => '345',
                'rooms' => '8',
                'beds' => '10',
                'baths' => '4',
                'sqm' => '233',
                'address' => 'Via Donatello 1, 00034 Colleferro',
                'city' => 'Roma',
                'lat' => '41.72933',
                'lng' => '13.01202',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '7328',
            ],
            [
                'user_id' => '1',
                'title' => 'Vita in appartamento non esitare ad affittare',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'vita-in-appartamento-non-esitare-ad-affittare',
                'price' => '129',
                'rooms' => '4',
                'beds' => '3',
                'baths' => '2',
                'sqm' => '111',
                'address' => 'Via Monte Napoleone 3, 20121 Milano',
                'city' => 'Milano',
                'lat' => '45.46751',
                'lng' => '9.19598',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '368',
            ],
            [
                'user_id' => '1',
                'title' => 'Sentiti libero dalla tua monotona abitazione',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'sentiti-libero-dalla-tua-monotona-abitazione',
                'price' => '49',
                'rooms' => '2',
                'beds' => '2',
                'baths' => '1',
                'sqm' => '77',
                'address' => 'Via Monte Napoleone 4, 20121 Milano',
                'city' => 'Milano',
                'lat' => '45.46752',
                'lng' => '9.19615',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '668',
            ],
            [
                'user_id' => '1',
                'title' => 'Come sentirsi a casa con un appartamento da sogno',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'come-sentirsi-a-casa-con-un-appartamento-da-sogno',
                'price' => '38',
                'rooms' => '3',
                'beds' => '5',
                'baths' => '2',
                'sqm' => '88',
                'address' => 'Via Monte Napoleone 6, 20121 Milano',
                'city' => 'Milano',
                'lat' => '45.46753',
                'lng' => '9.19619',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '68',
            ],
            [
                'user_id' => '1',
                'title' => 'Non ho tempo per i titoli vieni nel mio apaprtamento',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'non-ho-tempo-per-i-titoli-vieni-nel-mio-apaprtamento',
                'price' => '78',
                'rooms' => '5',
                'beds' => '7',
                'baths' => '1',
                'sqm' => '145',
                'address' => 'Via Bagutta 14, 20121 Milano',
                'city' => 'Milano',
                'lat' => '45.46774',
                'lng' => '9.19657',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '182',
            ],
            [
                'user_id' => '1',
                'title' => 'Colorata e piena di vita nel centro di roma',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'colorata-e-piena-di-vita-nel-centro-di-roma',
                'price' => '99',
                'rooms' => '5',
                'beds' => '7',
                'baths' => '1',
                'sqm' => '145',
                'address' => 'Via Montecassiano 3, 00156 Roma',
                'city' => 'Roma',
                'lat' => '41.94448',
                'lng' => '12.57737',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '1832',
            ],
            [
                'user_id' => '1',
                'title' => 'La villa campione al pari di una reggia vieni ora',
                'overview' => 'Con tanta passione questo appartamento mantiene accurate le peculiarità del luogo, utilizzando lo stile della città per migliorare il mobilio. Non ha molto senso ma ci piace.',
                'slug' => 'la-villa-campione-al-pari-di-una-reggia-vieni-ora',
                'price' => '560',
                'rooms' => '20',
                'beds' => '28',
                'baths' => '8',
                'sqm' => '583',
                'address' => 'Via Montecassiano 11, 00156 Roma',
                'city' => 'Roma',
                'lat' => '41.94465',
                'lng' => '12.57703',
                'flat_img' => 'flat_covers/esempio.jpg',
                'visibility' => '1',
                'views' => '5532',
            ]   
        ];

        foreach ($flat_seed as $flat_se) {
            $newFlat = new Flat();
            $newFlat->user_id = $flat_se['user_id'];
            $newFlat->title = $flat_se['title'];
            $newFlat->overview = $flat_se['overview'];
            $newFlat->slug = $flat_se['slug'];
            $newFlat->price = $flat_se['price'];
            $newFlat->rooms = $flat_se['rooms'];
            $newFlat->beds = $flat_se['beds'];
            $newFlat->baths = $flat_se['baths'];
            $newFlat->sqm = $flat_se['sqm'];
            $newFlat->address = $flat_se['address'];
            $newFlat->city = $flat_se['city'];
            $newFlat->lat = $flat_se['lat'];
            $newFlat->lng = $flat_se['lng'];
            $newFlat->flat_img = $flat_se['flat_img'];
            $newFlat->visibility = $flat_se['visibility'];
            $newFlat->views = $flat_se['views'];
            $newFlat->save();
        }

            // for ($i = 0; $i <= 10; $i++)
            // {
            //         $newFlat = new Flat();
            // $userCount = count(User::all()->toArray());
            // $newFlat->user_id = rand(1, $userCount);
            // $newFlat->title = $faker->sentence(6);
            // $newFlat->overview = $faker->text();
            // $slug = Str::slug($newFlat->title);
            // $sameSlug = Flat::where('slug', $slug)->first();
            // $counter = 1;
            // $memorySlug = $slug;
            // while ($sameSlug) {
            //     $slug = $memorySlug . '-' . $counter;
            //     $sameSlug = Flat::where('slug', $slug)->first();
            //     $counter++;
            // }//while
            // $newFlat->slug = $slug;
            // $newFlat->price = $faker->numberBetween(30, 200);
            // $newFlat->rooms = $faker->numberBetween(1, 10);
            // $newFlat->beds = $faker->numberBetween(1, 10);
            // $newFlat->baths = $faker->numberBetween(1, 5);
            // $newFlat->sqm = $faker->numberBetween(30, 300);
            // $newFlat->address = $faker->address();
            // $newFlat->lat = $faker->latitude($min = -90, $max = 90);// 77.147489
            // $newFlat->lng = $faker->longitude($min = -180, $max = 180);// 86.211205
            // $newFlat->flat_img = $faker->imageUrl(640, 480, 'animals', true);
            // $newFlat->visibility = $faker->boolean();
            // $newFlat->views = $faker->randomNumber(7, false);
            // $newFlat->save();
            // }
    }
}
