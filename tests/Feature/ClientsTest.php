<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;  
    
    // private User $user;
    
    // protected function setUp(): void
    // {
    //     parent::setUp();
    
    //     $this->user = $this->createUser();
    // }
    
    // public function test_paginated_clients_table_doesnt_contain_11th_record()
    // {
       
    //     $clients = Client::factory()->create();
    //     $lastclient = $clients->last();
        

    //     $response = $this->actingAs( $this->user)->get('/clients');

    //     $response->assertStatus(200);

    //     $response->assertViewHas('clients', function($collection) use ( $lastclient){
    //         return !$collection->contains( $lastclient);
    //     });
    // }


    // public function test_clientspage_is_not_empty_table()
    // {
    //     Client::create([
    //         'contact_name' => 'test company',
    //         'contact_email' => 'test@uche.com',
    //         'contact_phone_number' => '23556666744',
    //         'company_name' =>'agdjajhdjjdjiauddkka',
    //         'company_address' => 'ahusahhajhhha',
    //         'company_city' => 'ajjhhahhahaha',
    //         'company_zip' =>'123455'
    //     ]);
        
    //     $response = $this->get('/clients');

    //     $response->assertStatus(200);

    //     $response->assertDontSee(_('No Client Found'));
    // }
    public function test_paginated_projects_table_doesnt_contain_11th_record()
    {
        $user = User::factory()->create([
            'terms_accepted' => true
        ]);
        $clients = Client::factory(11)->create();
        $lastclient = $clients->last();
        

        $response = $this->actingAs($user)->get('/clients');

        $response->assertStatus(308);

        $response->assertViewHas('clients', function($collection) use ($lastclient){
            return !$collection->contains($lastclient);
        });
    }
}
