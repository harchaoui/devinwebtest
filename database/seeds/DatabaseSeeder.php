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
        // $this->call(UsersTableSeeder::class);
        App\City::create(['name' => 'Rabat', 'slug' => 'rabat']);
        App\City::create(['name' => 'Casa', 'slug' => 'casa']);
        App\City::create(['name' => 'Tangier', 'slug' => 'tangier']);

        App\DeliveryTime::create(['span'=>'9->12']);
        App\DeliveryTime::create(['span'=>'14->18']);
        App\DeliveryTime::create(['span'=>'10->13']);
        App\DeliveryTime::create(['span'=>'15->19']);
        App\DeliveryTime::create(['span'=>'14->18']);
        App\DeliveryTime::create(['span'=>'18-20']);

        App\CityDeliveryTime::create([''=>'']);

    }
}
