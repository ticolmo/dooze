<?php

namespace Tests\Feature\Livewire\Auth;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\Auth\Commentaires;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfilTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::find(8); 
        Livewire::actingAs($user)
            ->withQueryParams(['page' => 'profil'])
            ->test(Commentaires::class)
            ->assertStatus(200);
    }
}
