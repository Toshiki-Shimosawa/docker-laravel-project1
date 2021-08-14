<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;


class ContentDetail extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'img_path',
    ];

    public function content()
    {
        return $this->belongsTo(Content::class, 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo(ContentCategory::class, 'category_id');
    }

    public function getCategoryName()
    {
        return $this->category
        ->name;
    }
}
