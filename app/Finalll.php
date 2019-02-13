<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finalll extends Model
{
    protected $fillable = [
        'name', 
        'email',
        'address',
        'dateOfBirth',
        'phone'
    ];
}
