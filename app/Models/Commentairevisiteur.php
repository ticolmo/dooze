<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentairevisiteur extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'commentairevisiteur';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'contenu',
        'user_id',
        'club_id',
        'fichier_media',
        'created_at',
        'updated_at',
        
    ];

     /* relation un à plusieurs (inverse) */

     public function user(): BelongsTo
     {
         return $this->belongsTo(User::class, 'user_id');
     }
 
     public function club(): BelongsTo
     {
         return $this->belongsTo(Club::class, 'club_id');
     }

    /* relation un à plusieurs */

    public function reponse(): HasMany
    {
        return $this->hasMany(Reponsevisiteur::class);
    }

    /* relation un à un - polymorphique */

    public function publication(): MorphOne
    {
        return $this->morphOne(Publication::class, 'post');
    }
}
