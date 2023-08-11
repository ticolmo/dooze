<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Langue extends Model
{
    use HasFactory;
    protected $table = 'langue';
    
    protected $primaryKey = 'id_langue';

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
