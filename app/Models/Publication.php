<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publication';
    
    protected $primaryKey = 'id_publication';

    protected $fillable = [
        'post_id',
        'post_type',
        'motif_suppression',    
        
    ];
    

    /* relation un à un - polymorphique */

    public function post(): MorphTo
    {
        return $this->morphTo();
    }

    /* relation un à plusieurs */

    public function signalement(): HasMany
    {
        return $this->hasMany(Signalement::class);
    }
}
