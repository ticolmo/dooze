<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'message';
    
    protected $primaryKey = 'id';
    

    protected $fillable = [        
        'expediteur_id',
        'destinataire_id',
        'mailbox_id',
        'expFormContact_name',
        'expFormContact_email',
        'objet',
        'contenu',
        'has_reply',
        'created_at',
        'updated_at',
        'read_at',
        
    ];

    /* relation un à plusieurs (inverse) */

    public function expediteur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }

    public function destinataire(): BelongsTo
    {
        return $this->belongsTo(User::class, 'destinataire_id');
    }

    public function mailbox(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mailbox_id');
    }
}
