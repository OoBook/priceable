<?php

use Faker\Generator as Faker;
use OoBook\Priceable\Models\Price;

/**
 * factory(OoBook\Priceable\Models\Price::class, 10)->create();
 */
$factory->define(Price::class, function (Faker $faker) {
	return [
		'priceable_type' => 'Marshmallow\Product\Models\Product',
		'priceable_id' => '1',
        'vatrate_id' => 1,
        'currency_id' => 1,
        'display_price' => 100,
    ];
});
