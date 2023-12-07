<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleRead extends Model
{
    protected $fillable = [
        'article_id',
        'ip_address',
        'updated_at',
        'created_at'
    ];
    use HasFactory;
    
}
