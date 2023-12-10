<?php

use Tests\TestCase;
use App\Models\Vols;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;


class VolsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('vols.index'));

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $this->actingAsAdmin();
    
        // Assuming that 'vols.create' route is available for users with the 'access-vols' permission
        $response = $this->get(route('vols.create'));
    
        $response->assertStatus(200); // Change this to 200 if the user is allowed to access 'vols.create'
    }
    
    

    public function testStore()
    {
        $this->actingAsAdmin();
    
        $volsData = Vols::factory()->make()->toArray();
    
        $response = $this->post(route('vols.store'), $volsData);
    
        $response->assertRedirect(route('vols.index'));
        $this->assertDatabaseHas('vols', $volsData);
    }
    
    
    public function testEdit()
    {
        $this->actingAsAdmin();
    
        $vols = Vols::factory()->create();
    
        // Assuming that 'vols.edit' route is available for users with the 'access-vols' permission
        $response = $this->get(route('vols.edit', $vols));
    
        $response->assertStatus(200); // Change this to 200 if the user is allowed to access 'vols.edit'
    }
    
    

    public function testUpdate()
    {
        $this->actingAsAdmin();
    
        $vols = Vols::factory()->create();
        $updatedData = [
            'numero' => 'Updated Number',
            'date_depart' => now(),
            // Add other fields as needed
        ];
    
        $response = $this->put(route('vols.update', $vols), $updatedData);
    
        $response->assertRedirect(route('vols.index'));
        $this->assertDatabaseHas('vols', array_merge(['id' => $vols->id], $updatedData));
    }
    
    
    public function testDestroy()
    {
        $this->actingAsAdmin();
    
        $vols = Vols::factory()->create();
    
        // Assuming that 'vols.destroy' route is available for users with the 'access-vols' permission
        $response = $this->delete(route('vols.destroy', $vols));
    
        $response->assertRedirect(route('vols.index'));
        $this->assertDatabaseMissing('vols', ['id' => $vols->id]);
    }
    

    protected function actingAsAdmin()
    {
        $user = User::factory()->create();
        
        // Assign the role or permission
        Bouncer::assign('roleCompagnie')->to($user);
        Bouncer::allow($user)->to('access-vols');
        
        // Authenticate the user
        $this->actingAs($user);
        
        return $user;
    }
}
