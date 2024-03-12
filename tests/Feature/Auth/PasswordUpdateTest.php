<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;


    public function test_password_can_be_updated(): void
    {
        $locale = app()->getLocale();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/' . $locale . '/profile')
            ->put('/password', [
                'current_password' => 'password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/' . $locale . '/profile');

        $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
    }

    public function test_correct_password_must_be_provided_to_update_password(): void
    {
        $locale = app()->getLocale();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/' . $locale . '/profile')
            ->put('/password', [
                'current_password' => 'wrong-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            //->assertSessionHasErrorsIn('updatePassword', 'current_password')
            ->assertSessionHasErrors()
            ->assertRedirect('/' . $locale . '/profile');
    }
}
