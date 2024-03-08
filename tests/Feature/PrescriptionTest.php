<?php

namespace Tests\Feature;

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
        $response = $this->get('/'.$locale.'/prescriptions');

        $response->assertRedirect('/'.$locale.'/dashboard');
    }
}
