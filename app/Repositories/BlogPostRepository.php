<?php

namespace App\Repositories;

use App\Interfaces\BlogPostInterface;
use App\Models\BlogPost;

class BlogPostRepository implements BlogPostInterface
{
    public function index()
    {
        $blogPosts=BlogPost::with('comments')->get();

        return $blogPosts;
    }

    public function store($request)
    {
        $blogPost=BlogPost::create($request);

        return $blogPost;
    }

    public function update($request, $id)
    {
        $blogPost=BlogPost::findOrFail($id);

        $blogPost->update($request);

        return $blogPost;
    }

    public function delete($id)
    {
        $blogPost=BlogPost::findOrFail($id);

        $blogPost->delete();

        return $blogPost;
    }
}
