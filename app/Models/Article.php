<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleRead;
use App\Models\ArticleComment;
class Article extends Model
{
    use HasFactory;
    protected $translatable = ['name'];
    
    public function read() {
        
        return $this->hasOne(ArticleRead::class);
        
    }

    public function comments() {
        return $this->hasMany(ArticleComment::class);
    }

}
