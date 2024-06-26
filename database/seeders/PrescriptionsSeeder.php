<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PrescriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prescriptions')->insert([[
            'nameOfPrescription' => 'Twice a day',
            'dateOfPrescription' => Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' =>  fake()->numberBetween(1, 24),
            'frequencyOfIntakeInDays' => 1,
            'firstIntakeHour' => '10:00:00',
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'My first prescription',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' =>  fake()->numberBetween(1, 24),
            'frequencyOfIntakeInDays' => 1,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Treatment for my headache',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' =>  fake()->numberBetween(1, 24),
            'frequencyOfIntakeInDays' => 2,
            'firstIntakeHour' => '06:00:00',
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Treatment prescribed by Dr. Smith',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' =>  fake()->numberBetween(1, 24),
            'frequencyOfIntakeInDays' => 3,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Daily medication treatemnt',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' =>  fake()->numberBetween(1, 24),
            'frequencyOfIntakeInDays' => 4,
            'firstIntakeHour' => '07:00:00',
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Addison\'s Cortef',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 12,
            'frequencyOfIntakeInDays' => 1,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 11,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Florinef Addison\'s treatment',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 24,
            'frequencyOfIntakeInDays' => 1,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 12,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Addison treatment',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 24,
            'frequencyOfIntakeInDays' => 2,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 13,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Addison treatment',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 24,
            'frequencyOfIntakeInDays' => 7,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 14,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'T1 Diabetes treatment',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 24,
            'frequencyOfIntakeInDays' => 1,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 15,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'T1 Diabetes treatment',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 24,
            'frequencyOfIntakeInDays' => 1,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 16,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'T1 Diabetes treatment',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 24,
            'frequencyOfIntakeInDays' => 10,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 17,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'T1 Diabetes treatment',
            'dateOfPrescription' =>  Carbon::now(),
            'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
            'durationOfPrescriptionInDays' => 365,
            'frequencyBetweenDosesInHours' => 24,
            'frequencyOfIntakeInDays' => 30,
            'firstIntakeHour' => '08:00:00',
            'medication_id' => 18,
            'user_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
   
    ]);
    }
}
