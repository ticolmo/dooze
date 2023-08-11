<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questionnaire extends Model
{
    use HasFactory;

    protected $table = 'questionnaire';
    
    protected $primaryKey = 'id_questionnaire';

    /* relation un à un  */

    public function club(): BelongsTo
{
    return $this->belongsTo(Club::class, 'ref_club');
}
}
