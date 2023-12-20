<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gold;
use App\Models\GoldPrice;
use App\Models\Currency;
class GoldController extends Controller
{
    public function index() {
        $gold = Gold::with('price')->whereHas('price')->get();
        return $gold;
    }
    public function priceGold($id) {
        $parsedUrl = parse_url(request()->url())['host'];
        $splittedHost = explode('.', $parsedUrl);

        if(str_contains($parsedUrl, 'localhost') && count($splittedHost) > 1){
            $homeCurrency = $splittedHost[0];
        } else{
            $homeCurrency = count($splittedHost) > 2 ? $splittedHost[0] : 'egp';
        }

        $homeCurrencyId = Currency::query()->where('code', $homeCurrency)->value('id');
        
        $priceGold = GoldPrice::select('date')
        ->selectRaw('avg(buy_price) as buy_price')
        ->groupBy('date')
        ->where('home_currency_id', $homeCurrencyId)
        ->where('gold_id', $id)
        ->where('date', '>', now()->subDays(30)->endOfDay())
        ->get();
        return  $priceGold ;
    }
}
