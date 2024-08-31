<?php

namespace OoBook\Priceable\Facades;

class PriceService extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \OoBook\Priceable\PriceService::class;
    }
}
