<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MWhLevelTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_wh_level')->insert([
            ['id_warehouse' => 1, 'name_wh' => 'Warehouse A', 'level_wh' => 'Level 1'],
            ['id_warehouse' => 1, 'name_wh' => 'Warehouse A', 'level_wh' => 'Level 2'],
            // Add more entries as needed
        ]);
    }
} 