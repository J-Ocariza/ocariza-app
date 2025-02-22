<?php

namespace App\Providers;

use App\Services\userServ;
use Illuminate\Support\ServiceProvider;

class userProv extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this ->app->singleton(userServ::class, function ($app){
            $users = [
            [
                'name' => 'James Ocariza',
                'gender' => 'Male'
            ],
            [
                'name' => 'Andrew Ocariza',
                'gender' => 'Male'
            ]
            ];
        return new userServ($users);
        });
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
