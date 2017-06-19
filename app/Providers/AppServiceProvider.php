<?php

namespace App\Providers;

use App\Dealcloser\Validation\DomainValidation;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param DomainValidation $domainValidation
     *
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
