<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AdPhoto;
use App\Models\Comment;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'photo',
        'price',
        'location',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
{
    return $this->hasMany(AdPhoto::class);

}

public function comments()
{
    return $this->hasMany(Comment::class);
}

}

