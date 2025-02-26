<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MWhRackTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_wh_rack')->insert([
            ['id_warehouse' => 1, 'name_wh' => 'Warehouse A', 'rack_name' => 'Rack 1', 'rack_column' => 'Column 1'],
            ['id_warehouse' => 1, 'name_wh' => 'Warehouse A', 'rack_name' => 'Rack 2', 'rack_column' => 'Column 2'],
            // Add more entries as needed
        ]);
    }
} 