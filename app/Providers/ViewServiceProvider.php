<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\CommentComposer;
use App\Http\View\Composers\RoleComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['partials.sidebar', 'lists.categories'], CategoryComposer::class);
        View::composer(['partials.sidebar', 'lists.categories'], CommentComposer::class);
        View::composer('lists.roles', RoleComposer::class);
    }
}
