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

   
    /* relations un à plusieurs */
    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function commentaireclub(): HasMany
    {
        return $this->hasMany(Commentaireclub::class);
    }

    public function live(): HasMany
    {
        return $this->hasMany(Live::class);
    }

    /* relation un à un (inverse) */

    public function questionnaire(): HasOne
    {
        return $this->hasOne(Questionnaire::class);
    }

    


}
