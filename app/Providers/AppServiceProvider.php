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
        $parsedUrl = parse_url(request()->url())['host'];
        $splittedHost = explode('.', $parsedUrl);

        if(str_contains($parsedUrl, 'localhost') && count($splittedHost) > 0){
            $homeCurrency = $splittedHost[0];
        } else{
            $homeCurrency = count($splittedHost) > 2 ? $splittedHost[0] : 'egp';
        }

        $homeCurrencyId = Currency::query()->where('code', $homeCurrency)->value('id');
        $currenciesWithPrice = Currency::with(['prices' => function($q) use($homeCurrencyId){
            $q->where('home_currency_id', $homeCurrencyId);
        }, 'livePrice'])->whereHas('prices', function($q) use($homeCurrencyId) {
            $q->where('home_currency_id', $homeCurrencyId);
        })->where('code','!=','egp')->orderBy('sort')->get()->translate($lang);

        $countries = Currency::with('country')->whereHas('country')->where('can_be_main',1)->orderBy('sort')->get()->translate($lang);
        
        $gold = Gold::with(['prices' => function($q) use($homeCurrencyId){
            $q->where('home_currency_id', $homeCurrencyId);
        }])->whereHas('prices', function($q) use($homeCurrencyId) {
            $q->where('home_currency_id', $homeCurrencyId);
        })->orderBy('sort')->get()->translate($lang);


        view()->share('currencies', $currenciesWithPrice );
        view()->share('gold', $gold );
        view()->share('countries', $countries );
    }
}
