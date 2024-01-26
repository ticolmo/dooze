<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ClubResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pseudo' => $this->name,
            'categorie' => $this->resource->categorie,
            'email' => $this->resource->email,            
            'club' => new ClubResource($this->club)
        ];
    }
}
