<?php

namespace Tests\Feature;

use App\Http\Controllers\AeroportsController;
use App\Models\Aeroports;
use App\Repositories\AeroportRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\AeroportsFactory;
use Database\Factories\UserFactory;
use Bouncer;

class AeroportsControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware; // Reset the database after each test

    public function testIndex()
    {
        $user = UserFactory::new()->create();
        Bouncer::allow($user)->to('access-aeroport');
    
        $response = $this->actingAs($user)->get(route('aeroports.index'));
    
        $response->assertStatus(200)
            ->assertViewIs('aeroports.index')
            ->assertViewHas('aeroports');
    }


// -----------------------------------------


    public function testCreate()
    {
        // Create a user with appropriate permissions
        $user = User::factory()->create();
        Bouncer::allow($user)->to('access-aeroport');

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get(route('aeroports.create'));

        $response->assertStatus(200)
            ->assertViewIs('aeroports.create');
    }


// -----------------------------------------


    public function testStore()
    {
        // Implement a test for the store method
        // This may involve creating a mock repository to ensure the correct methods are called
        // You can use the Laravel testing database for this

        $data = [
            'nom_aeroport' => 'Test Airport',
            'ville_aeroport' => 'Test City',
            'code' => 'TST',
            'nombre_piste' => 3,
        ];

        $response = $this->post(route('aeroports.store'), $data);

        $response->assertStatus(302) // Check for a redirect after store
            ->assertRedirect(route('aeroports.index'));

        // Add assertions to check the database for the created Aeroport
        $this->assertDatabaseHas('aeroports', $data);

        
    }


// -----------------------------------------


   
    public function testEdit()
    {
        // Create an Aeroport in the database using the factory
        $aeroport = AeroportsFactory::new()->create();

        // Create a user with appropriate permissions
        $user = User::factory()->create();
        Bouncer::allow($user)->to('access-aeroport');

        // Authenticate the user
        $this->actingAs($user);

        $response = $this->get(route('aeroports.edit', ['aeroports' => $aeroport]));

        $response->assertStatus(200)
            ->assertViewIs('aeroports.edit')
            ->assertViewHas('aeroports', $aeroport);
    }


// -----------------------------------------


    public function testUpdate()
    {
        // Create an Aeroport in the database using the factory
        $aeroport = AeroportsFactory::new()->create();

        // Create a user with appropriate permissions
        $user = User::factory()->create();
        Bouncer::allow($user)->to('access-aeroport');

        // Authenticate the user
        $this->actingAs($user);

        $data = [
            'nom_aeroport' => 'Updated Airport',
            'ville_aeroport' => 'Updated City',
            'code' => 'UPD',
            'nombre_piste' => 4,
        ];

        $response = $this->put(route('aeroports.update', ['aeroports' => $aeroport]), $data);

        $response->assertStatus(302) // 302 is expected because it's a redirect
            ->assertRedirect(route('aeroports.index'));

        // Add assertions to check the database for the updated Aeroport
        $this->assertDatabaseHas('aeroports', $data);
    }
}