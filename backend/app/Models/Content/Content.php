<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;


class Content extends Model
{
    protected $fillable = [
        'release_datetime',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
