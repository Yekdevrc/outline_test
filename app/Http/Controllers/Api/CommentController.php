<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\CommentInterface;
use App\Models\BlogPost;
use App\Models\Comment;
use DeepCopy\f001\B;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $commentRepository;

    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository=$commentRepository;
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment=$this->commentRepository->store($request);


        return response()->json([
            'message'=> 'Comment Added Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment=$this->commentRepository->update($request, $id);

        return response()->json([
            'message'=> 'Comment Updated Successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comemnt=$this->commentRepository->delete($id);

        return response()->json([
            'message'=> 'Comment Deleted'
        ], 200);
    }
}
