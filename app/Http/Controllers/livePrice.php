<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\live_price;

class livePrice extends Controller
{
    public function index() {

        $currenciesWithPrice = live_price::create([
            
        ]);
   
        return   view('welcome')  ;
    }
}
