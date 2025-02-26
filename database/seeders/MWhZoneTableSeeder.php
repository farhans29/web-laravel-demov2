<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MWhZoneTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_wh_zone')->insert([
            ['id_warehouse' => 1, 'name_wh' => 'Warehouse A', 'name_zone' => 'Zone 1'],
            ['id_warehouse' => 1, 'name_wh' => 'Warehouse A', 'name_zone' => 'Zone 2'],
            // Add more entries as needed
        ]);
    }
} 