<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Model::preventLazyLoading();//to disable lazy loading of relations

//        Paginator::useBootstrapFive(); to configure which css engine to be used to display the pagination links

//        Gate::define('edit-job', function(User $user, Job $job){
//            return $job->employer->user->is($user);
//        }); -> transferred to Policy class
        //The Gate Facade inject the current authenticated user in the function as $user
        //if you're not authenticated, the Gate always fails without even triggering the closure logic
        //if we want the Gate to be triggered even if we are not signed in, we can set the parameter User as optional or
        //default it to null ?User $user or User $user=null
    }
}
