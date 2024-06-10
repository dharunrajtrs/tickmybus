<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebHeader;
use DB;

class HeaderSeeder extends Seeder
{
     
    public function run()
    {
        $header = WebHeader::first();

        if($header){
            goto end;

        }
        
        \DB::table('web_headers')->insert(array (
            0 => 
            array (
                'theme_color' => '#03314B',
            'logo' => 'logo.png',
            'fevicon' => 'favicon.ico',
            'btn_color' => '#ffffff',
            'heading_color' => '#e4af3a',
            'footer_bg_color' => '#000000',
            'footer_about_title' => 'Company',
            'footer_about_para' => '<p>Lorem Ipsum is simply dummy text of the had a printing and typesetting industry. Ipsum hasbeen the industrys printing and type seting the industrys printing and ting industry.</p>',
            'user_play_link' => 'https://misoftwares.in/',
            'user_app_link' => 'https://misoftwares.in/',
            'driver_play_link' => 'https://misoftwares.in/',
            'driver_app_link' => 'https://misoftwares.in/',
            'footer_quicklink_privacy' => 'https://misoftwares.in/',
            'footer_quicklink_terms' => 'https://misoftwares.in/',
            'footer_quicklink_contact' => 'https://misoftwares.in/',
            'footer_info_para' => '<p>Lorem Ipsum is simply dummy text of the had a printing</p>',
            'footer_info_mobile' => '+91-7871 917871',
            'footer_info_email' => 'dilip@misoftwares.com',
            'footer_copy_rights' => 'MI-Softwares',
            
        ),
    ));


end:
        
    }
}
