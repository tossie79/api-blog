<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\SendEmailInterface;
use App\Services\SendEmail;
use App\User;
use App\Observers\UserObserver;
use App\Post;
use App\Observers\PostObserver;

class AppServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap any application services.
     *
     * @return void
     */
	public function boot()
    {
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SendEmailInterface::class,SendEmail::class);
    }
}
