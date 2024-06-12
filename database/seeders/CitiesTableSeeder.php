<?php

namespace Database\Seeders;

use App\Models\AllCities;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // Empty the table
        $countries = AllCities::all();

        // if(sizeof($countries)==0){
        // Get all from the JSON file
        $JSON_countries = AllCities::allJSON();
        foreach ($JSON_countries as $country) {
            AllCities::firstOrCreate([
                'name'           => ((isset($country['name'])) ? $country['name'] : null),
                'state'           => ((isset($country['state'])) ? $country['state'] : null),
            ]);
        }
        // }
    }
}
