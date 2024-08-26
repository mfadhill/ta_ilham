<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Rating extends Authenticatable

{
    use HasFactory, Notifiable;
    protected $guarded = ['id'];
    protected $table = ['ratingregister'];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
