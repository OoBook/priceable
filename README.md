

# Priceable - A Laravel Package for Handling Prices and Products

This Laravel package, Priceable, simplifies the way you manage prices and products within your application.

## Features
**Product Models**: Define product models with attributes like price, tax rate, currency, etc.
**Price Calculations**: Easily calculate total price with discounts, taxes, and other adjustments.
**Flexible Pricing**: Support for tiered pricing, variants, and custom pricing logic.
**Formatting**: Format prices according to locale and currency settings.


## Installation
Require the package using Composer:
```
composer require oobook/priceable
```

#### Publish priceable config
Create the priceable config file under config/ folder using **artisan**
```
php artisan vendor:publish --provider="OoBook\Priceable\LaravelServiceProvider" --tag="config"
```

#### Run the migrations for currency, price type, vat rate and prices
```
php artisan migrate
```

#### Use the Priceable trait in your models:
Include the OoBook\Priceable\Traits\HasPriceable trait in your model to access price-related methods:

```php
<?php

namespace App\Models;

use OoBook\Priceable\Traits\HasPriceable;

class MyProduct extends Model
{
    use HasPriceable;

    // ... your model logic
}
```

### Contributing
We welcome contributions to Priceable! Please see the CONTRIBUTING.md file for details.

### License
This package is open-sourced under the MIT license. See the LICENSE file for more information.



