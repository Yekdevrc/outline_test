<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Handle the BlogPost "created" event.
     */
    public function created(BlogPost $blogPost): void
    {
        $timestamp= $blogPost->created_at;
        $actionType="POSt";
        $user_id= 1;

        \Log::info([
            'blog_post_id'=> $blogPost,
            'created_at'=>$timestamp,
            'action_type'=> $actionType,
            'user_id'=> $user_id
        ]);
    }

    /**
     * Handle the BlogPost "updated" event.
     */
    public function updated(BlogPost $blogPost): void
    {
        $timestamp= $blogPost->updated_at;
        $actionType="PUT";
        $user_id= 1;

        \Log::info([
            'blog_post_id'=> $blogPost,
            'created_at'=>$timestamp,
            'action_type'=> $actionType,
            'user_id'=> $user_id
        ]);
    }

    /**
     * Handle the BlogPost "deleted" event.
     */
    public function deleted(BlogPost $blogPost): void
    {
        $actionType="DELETE";
        $user_id= 1;

        \Log::info([
            'blog_post_id'=> $blogPost,
            'action_type'=> $actionType,
            'user_id'=> $user_id
        ]);
    }

    /**
     * Handle the BlogPost "restored" event.
     */
    public function restored(BlogPost $blogPost): void
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     */
    public function forceDeleted(BlogPost $blogPost): void
    {
        //
    }
}
