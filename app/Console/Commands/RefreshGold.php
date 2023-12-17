<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Gold;
use App\Models\Currency;
use App\Models\GoldPrice;
class RefreshGold extends Command
{

    protected $signature = 'gold:refresh';


    protected $description = 'Command description';

 
    public function handle()
    {
        // https://fluxtech.app/usd_and_gold/api/gold

        $gold_Egp = Http::get('https://fluxtech.app/usd_and_gold/api/gold');
        $gold_Egp = json_decode($gold_Egp);
        foreach ($gold_Egp as $goldItem) {
            if ($goldItem->price != NULL){

                $karat = $goldItem->karat;
                $id = Gold::where('karat',$karat)->value('id');
                $countryId = Currency::where('code','egp')->value('id');

                GoldPrice::updateOrCreate(
                    ['gold_id' => $id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
                        'buy_price'  => $goldItem->price->buy_price, 
                        'sell_price' => $goldItem->price->sell_price,
                        'international_price' => $goldItem->price->international_price,
                        'home_currency_id'=> $countryId,
                    ]
                );
            }
        };




        $syria = Http::withHeaders([ 'content-currency' => 24 ])->get('https://fluxtech.app/syrian-currencies/api/gold');

        $syria = json_decode($syria);
        foreach ($syria as $country) {
            if ($country->price != NULL){
                $countryId = Currency::where('code','syp')->value('id');
     
                GoldPrice::updateOrCreate(
                    [ 'home_currency_id'=> $countryId,'gold_id' => $country->id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
                        'home_currency_id' => $countryId,
                        'buy_price'  => $country->price->price, 
                        'sell_price' => $country->price->usd_price, 
                        'international_price' => $country->price->usd_price,
                    ]
                );
            }
        };


        $lebanon = Http::withHeaders([ 'content-currency' => 10 ])->get('https://fluxtech.app/syrian-currencies/api/gold');

        $lebanon = json_decode($lebanon);
        foreach ($lebanon as $country) {
            if ($country->price != NULL){
            
                $countryId = Currency::where('code','lbp')->value('id');


                GoldPrice::updateOrCreate(
                    [ 'home_currency_id'=> $countryId,'gold_id' => $country->id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                    [
                        'home_currency_id' => $countryId,
                        'buy_price'  => $country->price->price, 
                        'sell_price' => $country->price->usd_price, 
                        'international_price' => $country->price->usd_price,
                    ]
                );
            }
        }

        return Command::SUCCESS;
    }

}