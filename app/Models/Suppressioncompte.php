<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppressioncompte extends Model
{
    use HasFactory;

    protected $table = 'suppressioncompte';
    
    protected $primaryKey = 'id_suppression';

    protected $fillable = [
        'categorie',
        'pays',
        'club_id',
        'langue_id',
        'created_at',
        'updated_at',
        
    ];
}
