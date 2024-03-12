<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CalendarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('calendars')->insert([
            'dateOfIntake' => '2024-02-12',
            'hourOfIntake' => '12:24:49',
            'prescription_id' => 1,
        ]);
    }
}
