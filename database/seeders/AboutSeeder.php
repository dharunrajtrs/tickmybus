<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebAbout;
use DB;

class AboutSeeder extends Seeder
{
    public function run()
    { 
        $about = WebAbout::first();

        if($about){
            goto end;

        }
        
        \DB::table('web_abouts')->insert(array (
            0 => 
            array (
                'hero_bg' => 'aboutus.jpg',
                'about_title' => 'WHO WE ARE',
                'about_us' => 'ABOUT US',
                'about_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, 
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> 
                                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'about_img' => 'about.jpg',
                'driver_title' => 'OUR DRIVERS',
                'driver_heading' => 'DRIVERS',
                'driver1' => 'Adem john',
                'driver1_img' => 'driver.png',
                'driver2' => 'Michle gret',
                'driver2_img' => 'driver.png',
                'driver3' => 'David Warner',
                'driver3_img' => 'driver.png',
                'driver4' => 'David Warner',
                'driver4_img' => 'driver.png',
                'service_title' => 'OUR SERVICES',
                'service_heading' => 'WHAT WE PROVIDE',
                'service1_title' => 'PRIVATE-SERVICE TRANSPORTATION',
                'service1_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero</p>.',
                'service1_img' => 'bus-scan.jpg',
                'service2_title' => 'LUXURY BUS SERVICE',
                'service2_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero</p>.',
                'service2_img' => 'bus-scan.jpg',
                'service3_title' => 'RENTAL SERVICE',
                'service3_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero</p>.',
                'service3_img' => 'bus-scan.jpg',
                'service4_title' => 'TOUR PACKAGE TRIPS',
                'service4_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero</p>.',
                'service4_img' => 'bus-scan.jpg',
                'service_img' => 'service.jpg',
                'banner_title' => 'THE GREAT OFFER AVAILABLE NOW! LUXURY BUS',
                'banner_heading' => 'CALL US : 1800 123 4567',
                'banner_bg' => 'lux.jpg',
            
        ),
    ));


end:
    }
    
}
