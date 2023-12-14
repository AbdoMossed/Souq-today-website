<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;
use App\Models\BlackMarketPrices;
class CurrencyController extends Controller
{
    public function index() {

        // $syria   = Http::withHeaders([ 'content-currency' => 24 ])->get('https://fluxtech.app/syrian-currencies/api/currencies/prices');
        // $lebanon = Http::withHeaders([ 'content-currency' => 10 ])->get('https://fluxtech.app/syrian-currencies/api/currencies/prices');

        // $lebanon = json_decode($lebanon);


        $syria = Http::withHeaders([ 'content-currency' => 24 ])->get('https://fluxtech.app/syrian-currencies/api/gold');

        $syria = json_decode($syria);
        return     view('welcome');

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
