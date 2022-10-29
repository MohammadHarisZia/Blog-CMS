<?php

namespace App\Providers;

use App\Policies\Post;
use App\Policies\User;
use App\Models\Comment;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\CommentPolicy;
use App\Policies\TagPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
