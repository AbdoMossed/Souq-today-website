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
                $latestPrice = last($currency->black_market_prices);

                BlackMarketPrices::updateOrCreate(
                    ['currency_id' => $id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
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

        }
        return Command::SUCCESS;
    }
}
