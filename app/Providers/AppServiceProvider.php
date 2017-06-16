<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Dealcloser\Core\Settings\Settings;
use App\Dealcloser\Validation\DomainValidation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param DomainValidation $domainValidation
     * @return void
     */
    public function boot(DomainValidation $domainValidation)
    {
        Carbon::setLocale('nl');

        \Validator::extend('domain', function ($attribute, $value, $parameters, $validator) use ($domainValidation) {
            return $domainValidation->isValid(settings()->domain, $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
