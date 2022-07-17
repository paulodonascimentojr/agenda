<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiGit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-git';
    }
}