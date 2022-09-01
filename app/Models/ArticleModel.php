<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ArticleModel extends Model
{   
    use softDeletes;

    protected $table = 'article';
    protected $fillable = ['title', 'detail' ,'sex','good','good', 'tag','image' , 'updated_at', 'created_at', 'user_id' ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function article_tag () {
        return $this->hasMany('App\Models\ArticleTagModel','articles_id');
    }

    public function message () {
        return $this->hasMany('App\Models\MessageModel','articles_id');
    }

    public function good () {
        return $this->hasMany('App\Models\GoodModel','article_id');
    }

    public function bad () {
        return $this->hasMany('App\Models\BadModel','article_id');
    }

}
