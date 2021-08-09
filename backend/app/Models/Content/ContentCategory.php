<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;


class ContentCategory extends Model
{
    protected $fillable = [
        'name',
        'sort',
    ];
}
