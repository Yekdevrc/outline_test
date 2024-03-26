<?php

namespace App\Providers;

use App\Interfaces\BlogPostInterface;
use App\Interfaces\CommentInterface;
use App\Repositories\BlogPostRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BlogPostInterface::class, BlogPostRepository::class);
        $this->app->bind(CommentInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
