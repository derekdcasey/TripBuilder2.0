<?php

namespace App\Facades;

class Trip extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'trip';
    }
}