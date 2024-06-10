<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TimeZoneSeeder::class);
        // $this->call(DriverNeededDocumentSeeder::class);
        $this->call(SettingsSeeder::class);
        // $this->call(CancellationReasonSeeder::class);
        // $this->call(ComplaintTitleSeeder::class);
        // $this->call(FaqSeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(HomePageSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(HeaderSeeder::class);
        $this->call(PrivacySeeder::class);
        $this->call(TermSeeder::class);
        

        
    }
}
