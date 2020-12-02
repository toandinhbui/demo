<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    
    public function Categories_news()
    {
        return $this->belongsTo('App\Models\Categories_news', 'id_categoriesnews', 'id');
    }
}
