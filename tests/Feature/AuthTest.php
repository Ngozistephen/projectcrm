<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


     public function test_login_redirects_to_home(){
        User::create([
            'first_name' => 'user',
            'last_name' => 'test',
            'email' => 'test@user.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), 
            'terms_accepted' => true,
        ]);

        $response = $this->post('/login', [
            'email' => 'test@user.com',
            'password' => '123456789'
        ]); 

        $response->assertStatus(302);
        $response->assertRedirect('/home');

     }


    public function test_unauthenicated_user_cannot_access_project()
    {
        $response = $this->get('/projects');

        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
}
