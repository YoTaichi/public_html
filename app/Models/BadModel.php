<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadModel extends Model
{
    use HasFactory;
    protected $table = 'bad';
    protected $fillable = ['user_id','article_id','floor' ];

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
