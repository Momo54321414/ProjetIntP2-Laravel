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
                'actionTimestamp' => '2024-03-01 08:00:00',
                'action' => 'Opened pillbox',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-05 10:00:01',
                'action' => 'Opened pillbox',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-05 10:00:05',
                'action' => 'Closed pillbox',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-05 16:00:02',
                'action' => 'Unclosed pillbox',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-05 16:00:05',
                'action' => 'Closed pillbox',
                'device_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-10 16:00:10',
                'action' => 'Opened pillbox',
                'device_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-10 16:00:15',
                'action' => 'Closed pillbox',
                'device_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-15 16:00:20',
                'action' => 'Opened pillbox',
                'device_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-15 16:00:25',
                'action' => 'Closed pillbox',
                'device_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'actionTimestamp' => '2024-03-20 16:00:30',
                'action' => 'Opened pillbox',
                'device_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);


        
    }
}
