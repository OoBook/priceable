<?php

namespace Oobook\Priceable\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Oobook\Priceable\Models\Currency;

class SetCurrencyController extends Controller
{
    public function __invoke(Currency $currency, Request $request)
    {
        $request->setUserCurrency($currency);

        return redirect()->back();
    }
}
