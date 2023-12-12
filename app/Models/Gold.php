<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GoldPrice;
use TCG\Voyager\Traits\Translatable;

class Gold extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatable = ['name'];

    public function prices() {
        return $this->hasMany(GoldPrice::class)->orderBy('date', 'desc')->orderBy('hour', 'desc')->where('date','>=', now()->subDays(2)->startOfDay());
    }
}
