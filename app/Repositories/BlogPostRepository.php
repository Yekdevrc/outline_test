<?php

namespace App\Repositories;

use App\Events\BlogPostEvent;
use App\Interfaces\BlogPostInterface;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;

class BlogPostRepository implements BlogPostInterface
{
    public function index()
    {
        $blogPosts=BlogPost::with('comments')->get();

        return $blogPosts;
    }

    public function store($data)
    {
        $blogPost=BlogPost::create($data + [
            'user_id'=> Auth::user()->id
        ]);

        return $blogPost;
    }

    public function show($id)
    {
        $blogPost=BlogPost::with('comments')->findOrFail($id);

        // $user=Auth::user()->id;

        // event(new BlogPostEvent($user, $id));

        return $blogPost;
    }

    public function update($request, $id)
    {
        $blogPost=BlogPost::findOrFail($id);

        $blogPost->update($request + [
            'user_id'=> Auth::user()->id
        ]);

        return $blogPost;
    }

    public function delete($id)
    {
        $blogPost=BlogPost::findOrFail($id);

        $blogPost->delete();

        return $blogPost;
    }
}
