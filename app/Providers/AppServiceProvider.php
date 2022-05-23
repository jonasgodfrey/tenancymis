<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $views = ['layouts.app', 'layouts.user_layouts.app'];
        View::composer($views, function ($view) {
            $user = Auth::user();
            $data = ['username' => $user->name, 'url' => 'myapp.com'];
            $view->with('username', $data);
        });
    }
}
