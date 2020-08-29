<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address', 
        'city',
        'state',
    ];
    public $timestamps = true;
    
    
}
