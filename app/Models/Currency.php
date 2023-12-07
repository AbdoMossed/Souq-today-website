<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlackMarketPrices;
use App\Models\live_price;
use TCG\Voyager\Traits\Translatable;
class Currency extends Model
{
    use HasFactory, Translatable;
    
    protected $translatable = ['name'];

    public function prices() {
        return $this->hasMany(BlackMarketPrices::class)->orderBy('date', 'desc')->orderBy('hour', 'desc')->where('date','>', now()->subDays(2)->endOfDay());
    }
    public function livePrice() {
        return $this->hasOne(live_price::class)->orderBy('date', 'desc')->orderBy('hour', 'desc');
    }
}
