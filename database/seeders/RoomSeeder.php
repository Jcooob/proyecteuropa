<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Vaciar la tabla de rooms
        DB::table('rooms')->truncate();

        $rooms = [
            [
                'room_number' => '101',
                'price_per_night' => 90.00,
                'capacity' => 1,
                'description' => 'Habitación individual con vista a la montaña.',
                'picture' => 'https://blog.secom.es/wp-content/uploads/2021/06/iluminacion-habitacion-hotel-1177.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '102',
                'price_per_night' => 130.00,
                'capacity' => 2,
                'description' => 'Habitación con cama king size para dos personas, ideal para pareja, buena iluminación.',
                'picture' => 'https://static01.nyt.com/images/2019/03/24/travel/24trending-shophotels1/24trending-shophotels1-superJumbo.jpg',
                'category' => 'double',
                'state' => 'maintenance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '103',
                'price_per_night' => 180.00,
                'capacity' => 3,
                'description' => 'Habitación para familia con vista a la ciudad.',
                'picture' => 'https://hips.hearstapps.com/hmg-prod/images/habitacion-hotel-revolve2-1546271048.jpeg',
                'category' => 'family',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '104',
                'price_per_night' => 330.00,
                'capacity' => 6,
                'description' => 'Minidepartamento para familia de 6 personas, sala, 3 habitaciones y una vista fabulosa.',
                'picture' => 'https://media.admagazine.com/photos/65b927be727a9ac268def3e7/16:9/w_2560%2Cc_limit/atr.royalmansion-bar-mr.jpg',
                'category' => 'presidential',
                'state' => 'unavailable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '105',
                'price_per_night' => 180.00,
                'capacity' => 1,
                'description' => 'Habitación individual con muy buena iluminación',
                'picture' => 'https://granhotelnagari.com/wp-content/uploads/2022/04/habitacionesSMS.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '106',
                'price_per_night' => 170.00,
                'capacity' => 2,
                'description' => 'Habitación para pareja con balcón y buena iluminación natural',
                'picture' => 'https://www.hola.com/imagenes/decoracion/20230425230358/dormitorios-inspirados-en-habitaciones-hoteles-am/1-237-23/habitaciones-hotel-9t-t.jpg',
                'category' => 'double',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '107',
                'price_per_night' => 130.00,
                'capacity' => 1,
                'description' => 'Habitación individual con muy buena iluminación',
                'picture' => 'https://granhotelnagari.com/wp-content/uploads/2022/04/habitacionesSMS.jpg',
                'category' => 'single',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '108',
                'price_per_night' => 110.00,
                'capacity' => 1,
                'description' => 'Habitación individual con muy buena iluminación',
                'picture' => 'https://www.sambahotels.com/media/items/big/archivo_000--6-.jpeg',
                'category' => 'economy',
                'state' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Inserta los datos en la tabla 'rooms'
        DB::table('rooms')->insert($rooms);
    }
}
