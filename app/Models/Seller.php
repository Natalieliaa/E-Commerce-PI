<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $table = 'sellers';

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
