<?php

namespace Tests\Feature\Livewire\Auth;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\Auth\Data;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::find(8); 
        Livewire::actingAs($user)
            ->test(Data::class)
            ->set('Hervé', '')
            ->call('update')
            ->assertHasErrors('name');
    }
}
