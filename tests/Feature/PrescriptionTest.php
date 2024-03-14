<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrescriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_guest_access_P(): void
    {
        $locale = app()->getLocale();
        $response = $this->get('/' . $locale . '/prescriptions');

        $response->assertRedirect();
    }
    public function test_user_access_P(): void
    {
        $locale = app()->getLocale();
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);
        $response = $this->actingAs($user)->get('/' . $locale . '/prescriptions');

        $response->assertOk();
    }
    public function test_user_access_P_create(): void
    {
        $locale = app()->getLocale();
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);
        $response = $this->actingAs($user)->get('/' . $locale . '/prescriptions/create');

        $response->assertOk();
    }
    public function test_user_access_P_Empty_store(): void
    {
        $locale = app()->getLocale();
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);
        $response = $this
            ->actingAs($user)
            ->post('/' . $locale . '/prescriptions', [
                'nameOfPrescription' => '',
                'dateOfPrescription' => '',
                'dateOfStart' => '',
                'durationOfPrescriptionInDays' => '',
                'frequencyBetweenDosesInHours' => '',
                'firstIntakeHour' => '',
                'user_id' => $user->id,
                'medication_id' => '',
                'created_at' => '',
                'updated_at' => '',
            ])->assertSessionHasErrors([
                'nameOfPrescription',
                'dateOfPrescription',
                'dateOfStart',
                'durationOfPrescriptionInDays',
                'frequencyBetweenDosesInHours',
                'medication_id',
            ]);

        
      

    }
    public function test_user_access_P_store(): void
    {
        $locale = app()->getLocale();
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);
        $response = $this
            ->actingAs($user)
            ->post('/' . $locale . '/prescriptions', [
                'nameOfPrescription' => 'Test User',
                'dateOfPrescription' => Carbon::now()->subDays(60)->format('Y-m-d'),
                'dateOfStart' => Carbon::now()->format('Y-m-d'),
                'durationOfPrescriptionInDays' => 30,
                'frequencyBetweenDosesInHours' => 6,
                'firstIntakeHour' => Carbon::now()->format('H:i:s'),
                'user_id' => $user->id,
                'medication_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        $response->assertSessionHasNoErrors();

       // $response->assertCreated();
        $response->assertRedirect();
    }


}
