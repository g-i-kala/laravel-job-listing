<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

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
        Model::preventLazyLoading();
      //  Paginator::defaultView('Bootstrap-4');

    //   Gate::define('edit-job', function(User $user, Job $job) {
    //     return $job->employer->user->is($user);
    //});

    }
}
