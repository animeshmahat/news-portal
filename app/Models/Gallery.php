<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'thumbnail', 'status'
    ];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'name' => 'string | required | min:1 | max: 25',
            'thumbnail' => 'required',
            'thumbnail.*' => 'image | mimes:jpeg,png,jpg,gif,svg | max:5120',
            'status' => 'nullable | boolean',
        ]);
    }

    public function deleteImage($imageName)
    {
        $imagePath = public_path("uploads/gallery/{$imageName}");
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
