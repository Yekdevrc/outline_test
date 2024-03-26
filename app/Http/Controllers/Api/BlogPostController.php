<?php

namespace App\Http\Controllers\Api;

use App\Events\BlogPostEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogPostRequest;
use App\Interfaces\BlogPostInterface;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return response()->json([
            'blogposts'=>$blogPosts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPostRequest $request)
    {
        $blogPost=$this->blogPostRepository->store($request);

        return response()->json([
            'message'=> 'Blog Post Created Successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogPost=BlogPost::with('comments')->where('id',$id)->first();

        $user=Auth::user()->id;

        event(new BlogPostEvent($user, $id));

        return response()->json([
            'blogpost'=>$blogPost
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blogPost=$this->blogPostRepository->update($request, $id);

        return response()->json([
            'message'=> 'Blog Post UPdated Successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogPost=$this->blogPostRepository->delete($id);

        return response()->json([
            'message'=> 'Blog Post Deleted Successfully'
        ], 200);
    }
}
