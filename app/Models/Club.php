<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Club extends Model
{
    use HasFactory;
    protected $table = 'club';
    
    protected $primaryKey = 'id_club';

   

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function commentaireclub(): HasMany
    {
        return $this->hasMany(Commentaireclub::class);
    }

    /* relation un à un (inverse) */

    public function questionnaire(): HasOne
    {
        return $this->hasOne(Questionnaire::class);
    }


}
