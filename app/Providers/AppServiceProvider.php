<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        Gate::define('sekretaris', function(User $user){
            return $user->role === 'secretary';
        });
        Gate::define('rt', function(User $user){
            return $user->role === 'rt';
        });
        Gate::define('rw', function(User $user){
            return $user->role === 'rw';
        });
        Gate::define('citizen', function(User $user){
            return $user->role === 'citizen';
        });
        Paginator::useBootstrap();

        // View::composer('*', function ($view) {
        //     $unreadEventCount = 0;

        //     if (Auth::check()) {
        //         $unreadEventCount = DB::table('user_event_notifications')
        //             ->where('user_id', Auth::id())
        //             ->where('is_read', false)
        //             ->count();
        //     }

        //     $view->with('unreadEventCount', $unreadEventCount);
        // });


    }
}
