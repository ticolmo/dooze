<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClubResource;
use App\Http\Resources\UserResource;
use App\Models\Club;


class MailboxAdminController extends Controller
{
    public function index()
    {
        return [
            'member'=> UserResource::collection(User::all()),
            'club' => ClubResource::collection(Club::where('en_ligne',true)->orderBy('nom')->get())
        ] ;
        
    }
}
