<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPost;

class Comment extends Model
{
    use HasFactory;

    protected $dates=[
        'created_at',
        'deleted_at'
    ];

    protected $fillable=[
        'blog_post_id',
        'comments'
    ];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
