<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\NavbarComposer;
use Illuminate\Support\Facades\View;
use App\Models\Contact;


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
            View::composer('admin.includes.navBar', function ($view) {
            $unread = Contact::where('is_viewed', 0)->count();
            //session
            $view->with("unread", $unread);
        });
    }
}
