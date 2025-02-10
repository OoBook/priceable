<?php

namespace Oobook\Priceable;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Oobook\Priceable\Models\Currency;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__ . '/../config/priceable.php', 'priceable');

        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Request::macro('setUserCurrency', function (Currency $currency) {
            Session::put('user-currency', $currency->id);
        });

        Request::macro('getUserCurrency', function () {
            if ($session = Session::get('user-currency')) {
                return config('priceable.models.currency')::find($session);
            }

            $currency = config('priceable.models.currency')::find(config('priceable.defaults.currencies'));
            if (!$currency) {
                $currency = config('priceable.models.currency')::first();
            }

            return $currency;
        });

        $this->publishes([__DIR__ . '/../config/priceable.php' => config_path('priceable.php')], 'config');

        // Check if migration exists before publishing
        $filesystem = $this->app->make(Filesystem::class);
        $migrationPath = $this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR;
        $existingMigration = $filesystem->glob($migrationPath.'*_create_priceable_tables.php');

        if (empty($existingMigration)) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_priceable_tables.php.stub' => $this->getMigrationFileName('create_priceable_tables.php'),
            ], 'priceable-migrations');
        }
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     */
    protected function getMigrationFileName(string $migrationFileName): string
    {
        $timestamp = date('Y_m_d_His');

        $filesystem = $this->app->make(Filesystem::class);

        return Collection::make([$this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR])
            ->flatMap(fn ($path) => $filesystem->glob($path.'*_'.$migrationFileName))
            ->push($this->app->databasePath()."/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}
