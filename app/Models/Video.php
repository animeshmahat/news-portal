<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'status', 'featured'];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'title' => 'required|max:255|min:2',
            'url' => 'required',
            'status' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
        ]);
    }

    function getYoutubeIdFromUrl($url)
    {
        preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $url, $matches);
        if ($matches) {
            return $matches[2];
        }
    }
}
