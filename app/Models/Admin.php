<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama',
        'no_telepon',
        'alamat',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
