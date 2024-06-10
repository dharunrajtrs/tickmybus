<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenity;
use DB;

class AmenitySeeder extends Seeder
{
     protected $amenity = [
        ['name' => 'Bed',
            'icon' => 'bed.png',
        ],

        ['name' => 'Blanket',
            'icon' => 'blanket.png',
        ],

        ['name' => 'Fan',
            'icon' => 'fan.png',
        ],

        ['name' => 'Light',
            'icon' => 'bulb.png',
        ],

        ['name' => 'Water Bottle',
            'icon' => 'water.png',
        ],

        ['name' => 'Charging Port',
            'icon' => 'power-bank.png',
        ],

        ['name' => 'CCTV',
            'icon' => 'cctv.png',
        ],

        ['name' => 'Tracking My Bus',
            'icon' => 'bus-tracking.png',
        ],

        ['name' => 'SOS',
            'icon' => 'sos.png',
        ],
          
    ];
    public function run()
    {
        $created_params = $this->amenity;

        $value = Amenity::first();
        if(is_null($value))
        {
            foreach ($created_params as $amenity)
            {
                Amenity::create($amenity);
            }
        }else {
            foreach ($created_params as $amenity)
            {
                $value->update($amenity);
            }
        }
    }
}
