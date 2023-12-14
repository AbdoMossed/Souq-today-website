<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use  App\Models\Currency;
use  App\Models\BlackMarketPrices;
use  App\Models\live_price;


class RefreshCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:refresh';

    protected $description = 'Command description';


    public function handle()
    {
        // https://therealcurrencymarket.app/api/currencies/latest

        $currencies = Http::get('https://therealcurrencymarket.app/api/currencies/latest');
            
        $currencies = json_decode($currencies);
        foreach ($currencies as $currency) {
            if (!empty($currency->black_market_prices)) {
                $codeCurr = $currency->code;
                $id = Currency::where('code',$codeCurr)->value('id');
                $id_country = Currency::where('code','egp')->value('id');
                $latestPrice = last($currency->black_market_prices);

                BlackMarketPrices::updateOrCreate(
                    ['currency_id' => $id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
                        'home_currency_id' => $id_country,
                        'buy_price'  => $latestPrice->buy_price, 
                        'sell_price' => $latestPrice->sell_price, 
                    ]
                );
                live_price::updateOrCreate(
                    ['currency_id' => $id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
                        'price'  =>  last($currency->live_prices)->price,
                    ]
                );
            }

        };
        $syria = Http::withHeaders([ 'content-currency' => 24 ])->get('https://fluxtech.app/syrian-currencies/api/currencies/prices');

        $syria = json_decode($syria);
        foreach ($syria->country_prices as $country) {
            
                $id_country = Currency::where('code','syp')->value('id');
                BlackMarketPrices::updateOrCreate(
                    ['home_currency_id' => $id_country ,'currency_id' => $country->currency_id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
                        'home_currency_id' => $id_country,
                        'buy_price'  => $country->buy_price, 
                        'sell_price' => $country->sell_price, 
                    ]
                );

        };

        $lebanon = Http::withHeaders([ 'content-currency' => 10 ])->get('https://fluxtech.app/syrian-currencies/api/currencies/prices');

        $lebanon = json_decode($lebanon);
        foreach ($lebanon->country_prices as $country) {
            
                $id_country = Currency::where('code','lbp')->value('id');

                BlackMarketPrices::updateOrCreate(
                    ['home_currency_id' => $id_country ,'currency_id' => $country->currency_id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
                        'home_currency_id' => $id_country,
                        'buy_price'  => $country->buy_price, 
                        'sell_price' => $country->sell_price, 
                    ]
                );

        }
        return Command::SUCCESS;
    }
}
