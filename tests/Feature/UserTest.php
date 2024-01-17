<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{    
    /**
     * A basic feature test example.
     */
    public function test_user_is_connecting_to_his_account(): void
    {
        $response = $this->post('/login',[
            'email' => 'givoxad983@terkoer.com',
            'password' => 'laurent1234'
        ]);

        $response->assertRedirect('/home');
    }

    public function test_user_is_connected(){
        $user = User::find(8); 
        $response = $this->actingAs($user)->get('/home');
        $response->assertOk();

    }
}
