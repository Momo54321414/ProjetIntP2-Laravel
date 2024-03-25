<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index()
    {
        
        $users = User::factory()->count(3)->create();

       
        $response = $this->getJson('/api/users');

        
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => ['id', 'name', 'email', /* other user fields */],
                 ]);
    }

    public function test_show()
    {
       
        $user = User::factory()->create();

        
        $response = $this->getJson("/api/users/{$user->id}");

       
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'id', 'name', 'email', /* other user fields */
                 ]);
    }

    public function test_store()
    {
        
        $userData = User::factory()->make()->toArray();

        $response = $this->postJson('/api/users', $userData);

       
        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'id', 'name', 'email', 
                 ]);
    }

    public function test_update()
    {
        
        $user = User::factory()->create();
        $newData = ['name' => 'New Name'];

       
        $response = $this->putJson("/api/users/{$user->id}", $newData);

      
        $response->assertStatus(200)
                 ->assertJson(['name' => 'New Name']);
    }

    public function test_destroy()
    {
       
        $user = User::factory()->create();

       
        $response = $this->deleteJson("/api/users/{$user->id}");

       
        $response->assertStatus(204);
    }
}
