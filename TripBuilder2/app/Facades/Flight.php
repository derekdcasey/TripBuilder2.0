<?php

namespace App\Facades;

class Flight extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'flight';
    }
}