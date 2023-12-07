<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Gold;
use App\Models\GoldPrice;
class RefreshGold extends Command
{

    protected $signature = 'gold:refresh';


    protected $description = 'Command description';

 
    public function handle()
    {
        // https://fluxtech.app/usd_and_gold/api/gold

        $gold = Http::get('https://fluxtech.app/usd_and_gold/api/gold');
        $gold = json_decode($gold);
        foreach ($gold as $goldItem) {
            $karat = $goldItem->karat;
            $id = Gold::where('karat',$karat)->value('id');
            GoldPrice::updateOrCreate(
                ['gold_id' => $id, 'date' => now()->format('Y-m-d'), 'hour' => now()->format('H')],
                [
                    'buy_price'  => $goldItem->price->buy_price, 
                    'sell_price' => $goldItem->price->sell_price,
                    'international_price' => $goldItem->price->international_price,
                ]
            );
        }

        return Command::SUCCESS;
    }
}


