<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'unique_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'status',
        'featured',
        'url',
        'visitor'
    ];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'category_id' => 'required',
            'title' => 'required | string | min:2 | max:25',
            'content' => 'required | string ',
            'status' => 'nullable | boolean',
            'featured' => 'nullable | boolean',
            'url' => 'string',
            'thumbnail' => 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'
        ]);
    }
}
