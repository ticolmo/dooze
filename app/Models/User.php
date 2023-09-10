<?php

namespace App\Models;

use App\Models\Live;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'categorie',
        'pays',
        'club_id',
        'langue_id',
        'derniere_connexion',
        'photoprofil',
        'hashtag',
        'bio',
        'titrelien1',
        'lien1',
        'titrelien2',
        'lien2',

        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    /* relations un à plusieurs */

    public function commentaireclub(): HasMany
    {
        return $this->hasMany(Commentaireclub::class);
    }

    public function commentairevisiteur(): HasMany
    {
        return $this->hasMany(Commentairevisiteur::class);
    }

    public function message(): HasMany
    {
        return $this->hasMany(Message::class);
    }
    public function live(): HasMany
    {
        return $this->hasMany(Live::class);
    }


    /* relations un à plusieurs (inverse) */

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'club_id');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'langue_id');
    }

    /* relation un à plusieurs */

    public function signalement(): HasMany
    {
        return $this->hasMany(Signalement::class);
    }




}
