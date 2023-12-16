<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contenu',
        'fichier_media',
        'lieu',
        'user_id',
        'club_id',
        'reponse_id',
        'secteur_visiteur',
        'motif_suppression',
        'checked_at'

    ];

    protected $casts = [
        'secteur_visiteur' => 'boolean'
    ];
}
