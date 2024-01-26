<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Club;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClubTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_all_page_club_are_running(): void
    {
      $clubs = Club::where('en_ligne',true)->select(['url'])->pluck('url')->all();        

      foreach ($clubs as $club){
        $response = $this->get("/club/$club");        
       dump("Club testé: $club");        
        $response->assertStatus(200);
      }       
        
    }
}
