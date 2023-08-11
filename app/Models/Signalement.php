<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Signalement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'signalement';
    
    protected $primaryKey = 'id_signalement';

    protected $fillable = [
        'publication_id',
        'user_id',
        'motif',
        'note_administrateur',
        'administrateur_id',
        'created_at',
        'updated_at',
        
    ];

    /* relations un à plusieurs (inverse) */

    public function publication(): BelongsTo
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }

    /* id de l'auteur du signalement */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /*id de l'administrateur auteur de la note*/
    public function administrateur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'administrateur_id');
    }

    


}
