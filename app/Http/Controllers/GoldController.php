<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gold;
use App\Models\GoldPrice;
class GoldController extends Controller
{
    public function index() {
        $gold = Gold::with('price')->whereHas('price')->get();
        return $gold;
    }
    public function priceGold($id) {

        $priceGold = GoldPrice::select('date')
        ->selectRaw('avg(buy_price) as buy_price')
        ->groupBy('date')
        ->where('gold_id', $id)
        ->where('date', '>', now()->subDays(30)->endOfDay())
        ->get();
        return  $priceGold ;
    }
}
