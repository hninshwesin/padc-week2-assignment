<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::before(function ($user, $ability){
            if ($user->id == 3){
                return true;
            }
        });

//        Gate::define('update-post',function ($user, $post){
////            $user->id === $post->author_id;
//            return $user->id === 2;
//        });

        Gate::define('update-post',function ($user, $post){
//            dd($user,$post);
           return $user->id == $post->author_id;
        });

//        Gate::define('update-post','App/Policies/PostPolicy@update');
    }
}
