<?php

namespace App\Repositories;

use App\Interfaces\CommentInterface;
use App\Models\Comment;
use Illuminate\Validation\Rule;

class CommentRepository implements CommentInterface
{
    public function store($request)
    {
        $validated=$request->validate([
            'blog_post_id'=> ['required', Rule::exists('blog_posts', 'id')],
            'comments'=> ['required']
        ]);

        $comment=Comment::create($validated);
        return $comment;
    }

    public function update($request, $id)
    {
        $validated=$request->validate([
            'blog_post_id'=> ['required', Rule::exists('blog_posts', 'id')],
            'comments'=> ['required']
        ]);
        $comment=Comment::findOrFail($id);
        $comment->update($validated);
        return $comment;
    }

    public function delete($id)
    {
        $comment=Comment::findOrFail($id);

        $comment->delete();

        return $comment;
    }
}
