<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use Carbon\Carbon;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'country_code' => 'my',
            'country_name' => 'Malaysia',
            'delivery_charges' => '2.50',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Country::create([
            'country_code' => 'th',
            'country_name' => 'Thailand',
            'delivery_charges' => '3.50',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Country::create([
            'country_code' => 'sg',
            'country_name' => 'Singapore',
            'delivery_charges' => '4.50',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Country::create([
            'country_code' => 'id',
            'country_name' => 'Indonesia',
            'delivery_charges' => '6.50',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
