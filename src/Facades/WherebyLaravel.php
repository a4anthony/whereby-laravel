<?php

namespace A4Anthony\WherebyLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class WherebyLaravel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "whereby-laravel";
    }
}
