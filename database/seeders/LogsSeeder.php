<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logs = [
            [
                'device_id' => 1,
                'message' => 'Votre portière est ouverte',
                'actionTimestamp' => '2021-10-01 12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_id' => 1,
                'message' => 'Votre portière est mal fermé',
                'actionTimestamp' => '2021-10-01 12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_id' => 1,
                'message' => 'Votre portière est mal fermé gros cave',
                'actionTimestamp' => '2021-10-01 12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('logs')->insert($logs);
    }
}
