<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\bills as Authenticatable;

class bills extends Model 
{
	use Notifiable;
    protected $fillable = ['amount','email' ,'description','service'];
}
