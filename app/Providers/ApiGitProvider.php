<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class ApiGitProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('api-git', function(){
            return Http::withOptions([
                'verify' => false,
                'base_uri' => ' https://api.github.com/users/'
            ]);
        });
    }
}