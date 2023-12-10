<?php

use Tests\TestCase;
use App\Models\Compagnies;
use App\Repositories\CompagnieRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class CompagniesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('compagnies.index'));

        $response->assertStatus(200);
        // Add more assertions as needed
    }

    public function testCreate()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('compagnies.create'));

        $response->assertStatus(200); // You may want to assert a 200 status if the user is allowed to access the create page
    }

    public function testEdit()
    {
        $this->actingAsAdmin();

        $compagnie = Compagnies::factory()->create();

        $response = $this->get(route('compagnies.edit', $compagnie));

        $response->assertStatus(200);
        // Add more assertions as needed
    }

    public function testStore()
    {
        $this->actingAsAdmin();
    
        $compagnieData = Compagnies::factory()->make()->toArray();
    
        $response = $this->post(
            route('compagnies.store'),
            array_merge($compagnieData, ['_token' => csrf_token()])
        );
    
        $response->assertRedirect(route('compagnies.index'));
        $this->assertDatabaseHas('compagnies', $compagnieData);
        // Add more assertions as needed
    }
    
    public function testUpdate()
    {
        $this->actingAsAdmin();
    
        $compagnie = Compagnies::factory()->create();
        $updatedData = ['nom_compagnie' => 'Updated Name', 'pays' => 'Updated Country'];
    
        $response = $this->put(
            route('compagnies.update', $compagnie),
            array_merge($updatedData, ['_token' => csrf_token()])
        );
    
        $response->assertRedirect(route('compagnies.index'));
        $this->assertDatabaseHas('compagnies', array_merge(['id' => $compagnie->id], $updatedData));
        // Add more assertions as needed
    }
    
    public function testDestroy()
    {
        $this->actingAsAdmin();
    
        $compagnie = Compagnies::factory()->create();
    
        $response = $this->delete(
            route('compagnies.destroy', $compagnie),
            ['_token' => csrf_token()]
        );
    
        $response->assertRedirect(route('compagnies.index'));
        $this->assertDatabaseMissing('compagnies', ['id' => $compagnie->id]);
        // Add more assertions as needed
    }
    

    protected function actingAsAdmin()
    {
        $user = User::factory()->create();
        
        // Assign the role or permission
        Bouncer::assign('roleCompagnie')->to($user);
        Bouncer::allow($user)->to('access-compagnie');
        
        // Authenticate the user
        $this->actingAs($user);
        
        return $user;
    }
    
}
