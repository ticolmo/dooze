<?php

namespace App\Api\Giphy;

use Illuminate\Support\Facades\Http;

class Giphy
{
    public function api_key()
    {
        $api_key = 'OeQZ35qdlTJhCyTRbHHTsVbDVIdI7yL4';

        return $api_key;
    }

    public function trend()
    {
        $response = Http::get("https://api.giphy.com/v1/gifs/trending", [
            'api_key' => $this->api_key(),
            'limit' => 10,
            'rating' => 'g',
            'bundle' => 'messaging_non_clips',
        ]);

        $data = $response->json();

        return $data['data'];
    }
    public function search($query)
    {
        $response = Http::get("https://api.giphy.com/v1/gifs/search", [
            'api_key' => $this->api_key(),
            'q' => $query,
            'limit' => 30,
            'rating' => 'g',
            'bundle' => 'messaging_non_clips',
        ]);

        $data = $response->json();

        return $data['data'];
    }



}