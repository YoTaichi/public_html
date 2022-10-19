<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ArticleFloorModel extends Model
{   
    use softDeletes;

    protected $table = 'article_floor';
    protected $fillable = ['title', 'detail', 'floor', 'image' , 'updated_at', 'created_at', 'user_id' ,'article_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function article() {
        return $this->belongsTo('App\Models\ArticleModel');
    }
    
    public function message () {
        return $this->hasMany('App\Models\MessageModel','article_floor_id');
    }

    public function good () {
        return $this->hasMany('App\Models\GoodModel','floor');
    }

    public function bad () {
        return $this->hasMany('App\Models\BadModel','floor');
    }
    

}
