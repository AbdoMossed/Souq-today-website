<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlackMarketPrices;
use App\Models\live_price;
use App\Models\GoldPrice;
use App\Models\Country;
use TCG\Voyager\Traits\Translatable;
class Currency extends Model
{
    use HasFactory, Translatable;
    
    protected $translatable = ['name'];

    public function prices() {
        return $this->hasMany(BlackMarketPrices::class)->orderBy('date', 'desc')->orderBy('hour', 'desc')->where('date','>=', now()->subDays(2)->startOfDay());
    }
    public function livePrice() {
        return $this->hasOne(live_price::class)->orderBy('date', 'desc')->orderBy('hour', 'desc');
    }
    public function country() {
        return $this->hasOne(Country::class);
    }
    public function goldCurrency() {
        return $this->hasOne(GoldPrice::class);
    }
}
