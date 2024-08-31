<?php

namespace Tests\Unit;

use Tests\TestCase;
use OoBook\Priceable\Facades\Price;
use OoBook\Priceable\Models\Currency;

class CurrencyTest extends TestCase
{
    public function testItCanBeCreated()
    {
    	$currency = Currency::create([
    		'name' => 'EURO'
    	]);
    	$this->assertInstanceOf(Currency::class, $currency);
    }
}
