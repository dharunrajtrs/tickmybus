<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\WebContact;
use DB;

class ContactSeeder extends Seeder
{
     
    public function run()
    {
        $contact = WebContact::first();

        if($contact){
            goto end;

        }
        
        \DB::table('web_contacts')->insert(array (
            0 => 
            array (
                'hero_bg' => 'buses.jpg',
            'phone' => '+91-7871917871',
            'address' => 'xxxxxxxxxxxxx',
            'email' => '@gmail.com',
            'form_title' => 'GET IN TOUCH WITH US',
            'form_name' => 'Name',
            'form_email' => 'Email',
            'form_subject' => 'Subject',
            'form_btn' => 'Submit',
            'form_img' => 'contact.png',
            'map' => 'https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=mobility intelligence softwares&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
            
        ),
    ));


end:
      
    }
}
