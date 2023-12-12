<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Currency;
use App\Models\Gold;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Request;

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
        if (config('app.env') !== 'local') {
            \URL::forceScheme('https');
        }

        $lang = Request::segment(1) ?: config('app.locale');

        $currenciesWithPrice = Currency::with('prices','livePrice')->whereHas('prices')->where('code','!=','egp')->orderBy('sort')->get()->translate($lang);
        $gold = Gold::with('prices')->whereHas('prices')->orderBy('sort')->get()->translate($lang);
        view()->share('currencies', $currenciesWithPrice );
        view()->share('gold', $gold );
    }
}
