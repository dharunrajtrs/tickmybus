<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebHome;
use DB;

class HomePageSeeder extends Seeder
{
     
    public function run()
    {
        $home = WebHome::first();

        if($home){
            goto end;

        }
        
        \DB::table('web_homes')->insert(array (
            0 => 
            array (
                'hero_title_1' => 'Quick and Reliable Service!',
                'hero_short_title_1' => 'Service with gps- based despach for speed ',
                'hero_img1' => 'bus.png',
                'hero_title_2' => 'Quick and Reliable Service!',
                'hero_short_title_2' => 'Service with gps- based despach for speed ',
                'hero_img2' => 'bus1.jpg',
                'hero_title_3' => 'Quick and Reliable Service!',
                'hero_short_title_3' => 'Service with gps- based despach for speed ',
                'hero_img3' => 'bus2.jpg',
                'hero_booknow' => 'Book Now',
                'about_title' => 'WHO WE ARE',
                'about_us' => 'ABOUT US',
                'about_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'about_img' => 'about.jpg',
                'banner1_title' => 'CHOOSE YOUR BUS',
                'banner1_heading' => 'BOOK BUS NOW',
                'banner1_bg' => 'city_traffic.jpg',
                'bus_types_title' => 'TOP OUR BUSES',
                'bus_types_heading' => 'CHOOSE YOUR BUS',
                'sleeper1_heading' => 'PRAKASH',
                'sleeper1_title' => 'AC',
                'sleeper1_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'sleeper1_img' => 'bus-scan.png',
                'sleeper2_heading' => 'SCANIA',
                'sleeper2_title' => 'AC',
                'sleeper2_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'sleeper2_img' => 'bus-tata.png',
                'sleeper3_heading' => 'TATA',
                'sleeper3_title' => 'AC',
                'sleeper3_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p.',
                'sleeper3_img' => 'bus-pr.png',
                'semi_sleeper1_heading' => 'PRAKASH',
                'semi_sleeper1_title' => 'AC',
                'semi_sleeper1_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'semi_sleeper1_img' => 'bus-scan.png',
                'semi_sleeper2_heading' => 'SCANIA',
                'semi_sleeper2_title' => 'AC',
                'semi_sleeper2_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'semi_sleeper2_img' => 'bus-tata.png',
                'semi_sleeper3_heading' => 'TATA',
                'semi_sleeper3_title' => 'NON-AC',
                'semi_sleeper3_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'semi_sleeper3_img' => 'bus-pr.png',
                'seater1_heading' => 'PRAKASH',
                'seater1_title' => 'NON-AC',
                'seater1_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'seater1_img' => 'bus-scan.png',
                'seater2_heading' => 'SCANIA',
                'seater2_title' => 'AC',
                'seater2_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'seater2_img' => 'bus-tata.png',
                'seater3_heading' => 'TATA',
                'seater3_title' => 'AC',
                'seater3_para' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'seater3_img' => 'bus-pr.png',
                'banner2_title' => 'CALL US : 1800 123 4567',
                'banner2_btn' => 'BOOK NOW',
                'banner2_bg' => 'bus4.jpg',
                'dwnld_heading' => 'GET OUR',
                'dwnld_title' => 'MOBILE APPS',
                'dwnld_para' => '<p>Brady Bunch the Brady Bunch thats the way we all became the Brady Bunch. Goodbye gray sky I hold you. I hold you.
                                    There is nothing can hold Me when I hold you. Feels so right it cant be wrong. Rockin and rollin all week long.</p><br>
                                    <p>Brady Bunch. Goodbye gray sky I hold you. I hold you.</p>
                                    <p>There is nothing can hold Me when I hold you. Feels so right it cant be wrong. Rockin and rollin all week long.</p>',
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
