<?php

namespace App\Providers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // We use a View Composer to bind logic to a specific template when it's rendered.
        // Now, it targets 'layouts.guest' to make the menu available on the public-facing site.
        View::composer('layouts.guest', function ($view) {
            // We fetch only top-level menu items (where parent_id is null).
            // with('children') eager-loads all descendant items to prevent N+1 query issues.
            // orderBy('order') ensures the menu items are displayed in the specified order.
            $menuItems = MenuItem::whereNull('parent_id')->with('children')->orderBy('order')->get();

            // Pass the $menuItems variable to the view.
            $view->with('menuItems', $menuItems);
        });
    }
}
