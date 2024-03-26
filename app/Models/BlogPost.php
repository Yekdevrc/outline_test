<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class BlogPost extends Model
{
    use HasFactory;

    protected $dates=[
        'created_at',
        'deleted_at'
    ];

    protected $fillable=[
        'title',
        'description',
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
