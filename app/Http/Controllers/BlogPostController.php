<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogPostRequest;
use App\Http\Requests\Blog\UpdateBlogPostRequest;
use App\Interfaces\BlogPostInterface;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $blogPostRepository;
     public function __construct(BlogPostInterface $blogPostRepository)
     {
        $this->blogPostRepository=$blogPostRepository;
     }

    public function index()
    {
        $blogPosts=$this->blogPostRepository->index();

        return view('blog.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPostRequest $request)
    {
        $blogPost=$this->blogPostRepository->store($request->validated());

        return back()->with('success', "Blog Post Added Successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blogPost=BlogPost::findOrFail($id);

        $comments=Comment::with('blogPost')->where('blog_post_id', $id)->get();

        return view('blog.show', compact('blogPost', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blogPost=BlogPost::findOrFail($id);
        return view('blog.edit', compact('blogPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogPostRequest $request, $id)
    {
        $blogPost=$this->blogPostRepository->update($request->validated(), $id);

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blogPost=$this->blogPostRepository->delete($id);

        return back();
    }
}
