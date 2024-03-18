<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllUser extends Model
{
    protected $table = 'allusers'; // If your table name is 'allusers'

    protected $fillable = [
        'name',
        'email',
        'dob',
        'age',
        'sex',
        'pan',
        'balance',
        'address',
        'city',
        'profile_picture',
        'role',
        'password',
        'description',
    ];
}
