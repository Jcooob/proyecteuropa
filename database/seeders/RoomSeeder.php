<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'room_number' => '101',
                'price_per_night' => 130.00,
                'capacity' => 3,
                'description' => 'Habitación individual con vista a la montaña',
                'picture' => 'https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '102',
                'price_per_night' => 130.00,
                'capacity' => 3,
                'description' => 'Habitación individual con vista a la montaña',
                'picture' => 'https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '103',
                'price_per_night' => 130.00,
                'capacity' => 3,
                'description' => 'Habitación individual con vista a la montaña',
                'picture' => 'https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '104',
                'price_per_night' => 130.00,
                'capacity' => 3,
                'description' => 'Habitación individual con vista a la montaña',
                'picture' => 'https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '105',
                'price_per_night' => 130.00,
                'capacity' => 3,
                'description' => 'Habitación individual con vista a la montaña',
                'picture' => 'https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        // Inserta los datos en la tabla 'rooms'
        DB::table('rooms')->insert($rooms);
    }
}