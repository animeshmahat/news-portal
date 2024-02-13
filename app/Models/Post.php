<?php

namespace App\Models;

use App\Models\User;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            'title' => 'required | string | min:2 | max:100',
            'content' => 'required | string ',
            'status' => 'nullable | boolean',
            'featured' => 'nullable | boolean',
            'url' => 'string | required',
            'thumbnail' => 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'
        ]);
    }
    public function getUser()
    {
        $data = DB::table('users')->get();
        return $data;
    }
    public function getCategory()
    {
        $data = DB::table('categories')->where('status', '=', 1)->get();
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'post_id');
    }
}
