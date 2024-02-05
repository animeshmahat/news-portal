<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status'];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'title'         => 'required|max:25|min:2',
            'description'   => 'required|max:1000|min:2',
            'status'        => 'nullable|boolean',
        ]);
    }
}
