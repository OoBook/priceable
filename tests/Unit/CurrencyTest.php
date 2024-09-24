<?php

namespace Tests\Unit;

use Tests\TestCase;
use Oobook\Priceable\Facades\Price;
use Oobook\Priceable\Models\Currency;

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
