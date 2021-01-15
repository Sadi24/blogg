<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('accessAdmin' , function($user){
                // if ($user->isAdmin) {
                //     return true;
                // }
                // else{
                //     return false;
                // }

                return $user->isAdmin;
        });


        Gate::define('deletePost' , function($user , $post){
            return $user->id == $post->user_id;
           });
        //
    }
}
