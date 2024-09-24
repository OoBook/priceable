<?php

namespace Oobook\Priceable\Facades;

class PriceService extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \Oobook\Priceable\PriceService::class;
    }
}
