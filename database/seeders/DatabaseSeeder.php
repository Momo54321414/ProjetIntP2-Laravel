<?php namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\Log;
use App\Models\Prescription;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call(UserSeeder::class);
        $this->call(MedicationsSeeder::class);
        $this->call(InstructionsSeeder::class);
        $this->call(PrescriptionsSeeder::class);
        $this->call(CalendarsSeeder::class);
        $this->call(DevicesSeeder::class);
        $this->call(LogsSeeder::class);

    }
}