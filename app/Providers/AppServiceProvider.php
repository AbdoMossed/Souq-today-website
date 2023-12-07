<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Currency;
use App\Models\Gold;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $lang = app()->getLocale();
        $currenciesWithPrice = Currency::with('prices','livePrice')->whereHas('prices')->get()->translate($lang);
        $gold = Gold::with('prices')->whereHas('prices')->get()->translate($lang);
        view()->share('currencies', $currenciesWithPrice );
        view()->share('gold', $gold );
    }
}
