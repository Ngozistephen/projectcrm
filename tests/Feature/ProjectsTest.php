<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    // DO NOT RUN ON MY DATABASE CONFIGURE MY SQLITE FIRST 
    use RefreshDatabase;  
    
    private User $user;
    
    protected function setUp(): void
    {
        parent::setUp();
    
        $this->user = $this->createUser();
    }
    
    public function test_paginated_projects_table_doesnt_contain_11th_record()
    {
       
        $projects = Project::factory(11)->create();
        $lastproject = $projects->last();
        

        $response = $this->actingAs( $this->user)->get('/projects');

        $response->assertStatus(200);

        $response->assertViewHas('projects', function($collection) use ($lastproject){
            return !$collection->contains($lastproject);
        });
    }


   
    // public function test_projects_page_contains_non_empty_table()
    // {

    //     Project::factory(11)->create();
    //     $response = $this->get('/projects');

    //     $response->assertStatus(200);

    //     $response->assertViewHas('projects', function($collection) use ($project){
    //         return !$collection->contains($project)
    //     });
    // }



    private function createUser(): User
    {
        return User::factory()->create([
            'terms_accepted' => true
        ]);
    }
}
