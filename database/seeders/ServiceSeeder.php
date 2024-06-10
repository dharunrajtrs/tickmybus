<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebService;
use DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
    $service = WebService::first();

    if($service){
        goto end;

    }
    
    \DB::table('web_services')->insert(array (
        0 => 
        array (
            'hero_bg' => 'bus5.jpg',
            'service_title' => 'OUR SERVICES',
            'service_heading' => 'WHAT WE PROVIDE',
            'service1_title' => 'PRIVATE-SERVICE TRANSPORTATION',
            'service1_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'service1_img' => 'bus-scan.jpg',
            'service2_title' => 'LUXURY BUS SERVICE',
            'service2_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'service2_img' => 'bus-scan.jpg',
            'service3_title' => 'RENTAL SERVICE',
            'service3_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'service3_img' => 'bus-scan.jpg',
            'service4_title' => 'TOUR PACKAGE TRIPS',
            'service4_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'service4_img' => 'bus-scan.jpg',
            'service_img' => 'service.jpg',
            'amenity_title' =>'Amenity',
            'amenity_heading' =>' Bus Amenity',
            'amenity_para' =>' <p>Duis tincidunt ornare semper. Phasellus velit purus, max',
            'amenity1_title' => 'Fan',
            'amenity1_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity1_img' => 'fan.png',
            'amenity2_title' => 'Light',
            'amenity2_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity2_img' => 'bulb.png',
            'amenity3_title' => 'Blankets',
            'amenity3_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity3_img' => 'blanket.png',
            'amenity4_title' => 'Wi-Fi',
            'amenity4_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity4_img' => 'wifi.png',
            'amenity5_title' => 'Pillows',
            'amenity5_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity5_img' => 'pillow.png',
            'amenity6_title' => 'Charger-port',
            'amenity6_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity6_img' => 'charge.png',
            'amenity7_title' => 'Water Bottle',
            'amenity7_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity7_img' => 'bottle.png',
            'amenity8_title' => 'Luggage-Compartment',
            'amenity8_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity8_img' => 'lugg.png',
            'amenity9_title' => 'CCTV',
            'amenity9_para' => '<p>Duis tincidunt ornare semper. Phasellus velit purus, maximus sed leo eu, porta aliquet sapienlibero.</p>',
            'amenity9_img' => 'cctv.png',
            'dwnld_heading' => 'GET OUR',
            'dwnld_title' => 'MOBILE APPS',
            'dwnld_para' => '<p>Brady Bunch the Brady Bunch thats the way we all became the Brady Bunch. Goodbye gray sky I hold you. I hold you.
                               There is nothing can hold Me when I hold you. Feels so right it cant be wrong. Rockin and rollin all week long.</p>
                              <p> Brady Bunch. Goodbye gray sky I hold you. I hold you.</p>
                               <p> There is nothing can hold Me when I hold you. Feels so right it cant be wrong. Rockin and rollin all week long.</p>',
            'dwnld_title1' => 'Download Now',
            'dwnld_para1' => '<p>There is nothing can hold Me when I hold you. Feels so right it cant be wrong. Rockin and rollin all week long.</p>',
            'dwnld_playstore' => 'https://misoftwares.in/',
            'dwnld_appstore' => 'https://misoftwares.in/',
            'dwnld1_playstore' => 'https://misoftwares.in/',
            'dwnld1_appstore' => 'https://misoftwares.in/',
        
    ),
));


end:

     

    }
}
