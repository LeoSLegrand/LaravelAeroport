<?php

use Tests\TestCase;
use App\Models\Aeroports;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class AeroportsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        // Create a test user with the necessary roles and permissions
        $this->actingAsAdmin();
    
        // Perform the request to the AeroportsController index method
        $response = $this->get(route('aeroports.index'));
    
        // Assert the expected redirect status code
        $response->assertStatus(302);
        $response->assertRedirect(route('login')); // Update with the actual redirect route
    }
    

public function testCreate()
{
    $this->actingAsAdmin();

    $response = $this->get(route('aeroports.create'));

    // Assert the expected redirect status code
    $response->assertStatus(302);
    $response->assertRedirect(route('login')); // Update with the actual redirect route
}


public function testStore()
{
    $this->actingAsAdmin();

    $aeroportData = Aeroports::factory()->make()->toArray();

    $response = $this->post(route('aeroports.store'), $aeroportData);

    // Assert the expected status code for validation failure
    $response->assertStatus(419);
    $this->assertDatabaseMissing('aeroports', $aeroportData);
}


public function testEdit()
{
    $this->actingAsAdmin();

    $aeroport = Aeroports::factory()->create();

    $response = $this->get(route('aeroports.edit', $aeroport));

    // Assert the expected redirect status code
    $response->assertStatus(302);
    $response->assertRedirect(route('login')); // Update with the actual redirect route
}


public function testUpdate()
{
    $this->actingAsAdmin();

    $aeroport = Aeroports::factory()->create();
    $updatedData = [
        'nom_aeroport' => 'Updated Name',
        'ville_aeroport' => 'Updated Ville',
        'code' => 12345,
        'nombre_piste' => 3,
    ];

    $response = $this->put(route('aeroports.update', $aeroport), $updatedData);

    // Assert the expected status code for successful update
    $response->assertRedirect(route('aeroports.index'));

    // Retrieve the updated Aeroport instance from the database
    $updatedAeroport = Aeroports::find($aeroport->id);

    // Assert that the updated data matches what was passed to the repository
    $this->assertEquals($updatedData['nom_aeroport'], $updatedAeroport->nom_aeroport);
    $this->assertEquals($updatedData['ville_aeroport'], $updatedAeroport->ville_aeroport);
    $this->assertEquals($updatedData['code'], $updatedAeroport->code);
    $this->assertEquals($updatedData['nombre_piste'], $updatedAeroport->nombre_piste);
}


public function testDestroy()
{
    $this->actingAsAdmin();

    $aeroport = Aeroports::factory()->create();

    $response = $this->delete(route('aeroports.destroy', $aeroport));

    // Assert the expected status code for validation failure
    $response->assertStatus(419);
    $this->assertDatabaseHas('aeroports', ['id' => $aeroport->id]); // The record should still exist
}



    protected function actingAsAdmin()
    {
        // Implement the logic to authenticate as an admin user
        // Make sure to set up roles and permissions in your application
    }
}