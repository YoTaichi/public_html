<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodModel extends Model
{
    use HasFactory;
    protected $table = 'good';
    protected $fillable = ['user_id','article_id' ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function article() {
        return $this->belongsTo('App\Models\ArticleModel');
    }

    public function article_floor() {
        return $this->belongsTo('App\Models\ArticleFloorModel');
    }
    
}
