<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponseclub extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reponseclub';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'contenu',
        'user_id',
        'club_id',
        'commentaireclub_id',
        'fichier_media',
        'created_at',
        'updated_at',
        
    ];

    /* Relations avec les autres tables - un à plusieurs (inverse) */

    public function commentaire(): BelongsTo
    {
        return $this->belongsTo(Commentaireclub::class, 'commentaireclub_id');
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* relation un à un - polymorphique */

    public function publication(): MorphOne
    {
        return $this->morphOne(Publication::class, 'post');
    }
}
