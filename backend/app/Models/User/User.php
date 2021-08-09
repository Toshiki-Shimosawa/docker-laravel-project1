<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $fillable = [
        'member_code',
        'name',
        'email',
        'password'
    ];
}
