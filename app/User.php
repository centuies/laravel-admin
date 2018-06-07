<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	//允许批量赋值
    protected $fillable = ['name','password','status','email','phone'];
}
