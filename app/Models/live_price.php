<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class live_price extends Model
{
    use HasFactory;
    protected $fillable = [
        'currency_id',
        'price',
        'date',
        'hour',
    ];
}
