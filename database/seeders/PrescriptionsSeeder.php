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
        DB::table('prescriptions')->insert([
            [
                'nameOfPrescription' => 'Twice a day',
                'dateOfPrescription' => Carbon::now(),
                'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
                'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),

                'frequencyPerDay' => fake()->numberBetween(1, 6),
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

                'frequencyPerDay' => fake()->numberBetween(1, 6),
                'medication_id' => fake()->numberBetween(1, 9),
                'user_id' => fake()->numberBetween(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nameOfPrescription' => 'Monday blues',
                'dateOfPrescription' =>  Carbon::now(),
                'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
                'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),

                'frequencyPerDay' => fake()->numberBetween(1, 6),
                'medication_id' => fake()->numberBetween(1, 9),
                'user_id' => fake()->numberBetween(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nameOfPrescription' => 'Making it pillable',
                'dateOfPrescription' =>  Carbon::now(),
                'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
                'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),

                'frequencyPerDay' => fake()->numberBetween(1, 6),
                'medication_id' => fake()->numberBetween(1, 9),
                'user_id' => fake()->numberBetween(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nameOfPrescription' => 'Intake of pills',
                'dateOfPrescription' =>  Carbon::now(),
                'dateOfStart' => Carbon::now()->addDays(fake()->numberBetween(1, 20)),
                'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),

                'frequencyPerDay' => fake()->numberBetween(1, 6),
                'medication_id' => fake()->numberBetween(1, 9),
                'user_id' => fake()->numberBetween(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
