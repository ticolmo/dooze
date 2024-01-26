<?php

namespace Tests\Feature\Livewire\Club;

use App\Livewire\Club\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::withQueryParams(['page' => 'fans'], ['section' => 'visitors'])
        ->test(Index::class)
        ->assertStatus(200);
        
    }
}
