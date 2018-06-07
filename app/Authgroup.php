<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authgroup extends Model
{
   protected $table = 'auth_group';

   protected $fillable = ['name','status'];
}
