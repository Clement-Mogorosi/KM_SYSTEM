<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\appointments as Authenticatable;

class appointments extends Model 
{
	use Notifiable;
    protected $fillable = ['id','user_email', 'service','start_time','date','created_at','updated_at','description','status'];
}
