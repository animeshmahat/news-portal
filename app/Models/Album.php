<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'gallery_id' => 'required',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50000|nullable'
        ]);
    }

    public function getGallery()
    {
        $data = DB::table('galleries')->where('status', '=', 1)->get();
        return $data;
    }
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
