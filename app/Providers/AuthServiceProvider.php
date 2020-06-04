<?php

namespace App\Providers;

use App\User;
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
    ];

    protected $override_methods = [
        "store" => "create",
        "update" => "edit",
        "destroy" => "delete",
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('resource', function(User $user, string $resource) {
            $resourceArr = explode('.', $resource);

            if(count($resourceArr) < 2)
                return true;

            if(array_key_exists($resourceArr[1], $this->override_methods))
                $resourceArr[1] = $this->override_methods[$resourceArr[1]];

            foreach ($user->getAttribute('profiles') as $profile) {
                foreach ($profile->getAttribute('resources') as $resource)
                    if ($resource->getAttribute('controller') == $resourceArr[0]
                        && $resource->getAttribute('action') == $resourceArr[1])
                        return true;
            }

            return false;
        });
    }
}
