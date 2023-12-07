<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldPrice extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'gold_id',
        'buy_price',
        'sell_price',
        'international_price',
        'date',
        'hour',
    ];
    
}
