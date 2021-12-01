<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\users as Authenticatable;

class users extends Model 
{
	use Notifiable;
    protected $fillable = ['name', 'email', 'password','user_role','gender','phone','balance','avatar'];
}



