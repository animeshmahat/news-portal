<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'unique_id',
        'title',
        'slug',
        'thumbnail',
        'context',
        'status',
        'featured',
        'url',
        'visitor'
    ];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'title' => 'required | string'
        ]);
    }
}
