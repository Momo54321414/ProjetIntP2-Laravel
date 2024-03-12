<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logs')->insert([[
                'actionTimestamp' => '2024-03-01 00:00:00',
                'action' => 'Une porte est ouverte',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-05 00:00:01',
                'action' => 'Votre portière est mal fermée',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-05 00:00:02',
                'action' => 'Votre portière est mal fermée, gros cave',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        
    }
}
