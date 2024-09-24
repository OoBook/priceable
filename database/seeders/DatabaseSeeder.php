<?php

namespace Oobook\Priceable\Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        dd('called');
        $this->call([
            CurrencySeeder::class,
            VatRateSeeder::class,
            PriceTypeSeeder::class,
        ]);
    }
}
