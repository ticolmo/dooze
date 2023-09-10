<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Live extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'live';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'type',
        'description',
        'with_password',
        'image',
        'password',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
        
    ];

    protected $casts = [
        'with_password' => 'boolean',
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

}
