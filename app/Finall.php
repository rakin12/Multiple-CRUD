<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finall extends Model
{
    protected $fillable = [
        'name', 
        'email',
        'address',
        'dateOfBirth',
        'phone'
    ];

}
