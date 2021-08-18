<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

use App\Models\User\User;

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

    public function detail()
    {
        return $this->hasOne(ContentDetail::class, 'parent_id');
    }

    public function getDetailTitle()
    {
        return $this->detail
        ->title;
    }

    public function getDetailDescription()
    {
        return $this->detail
        ->description;
    }

    public function getDetailImagePath()
    {
        return $this->detail
        ->img_path;
    }

    public function getDetailCategoryName()
    {
        return $this->detail
        ->getCategoryName();
    }

    public function getDetailCategoryId()
    {
        return $this->detail
        ->getCategoryId();
    }

    public function getUserName()
    {
        return $this->user
        ->name;
    }
}
