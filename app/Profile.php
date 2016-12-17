<?php

namespace App;
// use App\User;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    public function getUserName()
    {
    	return User::where('id' , $this->user_id)->first()->name;
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
