<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\BlackMarketPrices;
class CurrencyController extends Controller
{
    public function index() {

        $currenciesWithPrice = Currency::with('prices')->whereHas('prices')->get();
   
        return   view('welcome')  ;
    }
    public function priceCurrency($id) {

        $priceCurrency = BlackMarketPrices::select('date')
        ->selectRaw('avg(buy_price) as buy_price')
        ->groupBy('date')
        ->where('currency_id', $id)
        ->where('date', '>', now()->subDays(30)->endOfDay())
        ->get();
        
        return  $priceCurrency;
    }
}
