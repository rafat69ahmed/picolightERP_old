<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public function getUserName()
    {
    	return User::where('id' , $this->client_id)->first()->name;
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
    protected $fillable = ['name', 'address'];
    // protected $fillable = ['name', 'address','client_id'];
}
