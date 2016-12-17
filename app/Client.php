<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // public $id;
    // public $name;
    protected $fillable = ['name', 'address'];
}
