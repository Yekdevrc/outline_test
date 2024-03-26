<?php

namespace App\Observers;

use App\Models\Comment;
use Carbon\Carbon;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        $timestamp= Carbon::now();
        $actionType="POST";
        $user_id= 1;

        \Log::info([
            'comment_id'=> $comment,
            'created_at'=>$timestamp,
            'action_type'=> $actionType,
            'user_id'=> $user_id
        ]);
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        $timestamp= Carbon::now();
        $actionType="PUT";
        $user_id= 1;

        \Log::info([
            'comment_id'=> $comment,
            'updated_at'=>$timestamp,
            'action_type'=> $actionType,
            'user_id'=> $user_id
        ]);
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        $actionType="delete";
        $user_id= 1;

        \Log::info([
            'comment_id'=> $comment,
            'action_type'=> $actionType,
            'user_id'=> $user_id
        ]);
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
