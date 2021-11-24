<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Models\Activity;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function legals()
    {
        Activity::all();
        return $this->hasOne('App\Legals');
    }

}
