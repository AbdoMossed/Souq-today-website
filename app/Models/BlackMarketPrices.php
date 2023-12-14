<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackMarketPrices extends Model
{
    use HasFactory;
    protected $fillable = [
        'currency_id',
        'buy_price',
        'home_currency_id',
        'sell_price',
        'date',
        'hour',
    ];
}
