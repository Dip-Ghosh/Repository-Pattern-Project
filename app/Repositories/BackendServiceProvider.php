<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Assignment\AssignmentInterface',
            'App\Repositories\Assignment\AssignmentRepository'
        );
        $this->app->bind(
            'App\Repositories\Campaign\CampaignInterface',
            'App\Repositories\Campaign\CampaignRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
