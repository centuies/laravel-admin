<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'admins';
    protected $fillable = [
        'name', 'status', 'password', 'auth_group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
