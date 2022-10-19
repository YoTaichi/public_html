<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ArticleModel extends Model
{   
    use softDeletes;

    protected $table = 'article';
    protected $fillable = ['title', 'detail', 'sex', 'floor', 'good', 'bad', 'tag', 'image', 'updated_at', 'created_at', 'user_id' ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function article_tag () {
        return $this->hasMany('App\Models\ArticleTagModel','article_id');
    }

    public function article_floor () {
        return $this->hasMany('App\Models\ArticleFloorModel','article_id');
    }

    public function message () {
        return $this->hasMany('App\Models\MessageModel','article_id');
    }

    public function good () {
        return $this->hasMany('App\Models\GoodModel','article_id');
    }

    public function bad () {
        return $this->hasMany('App\Models\BadModel','article_id');
    }
    
    public function blacklist () {
        return $this->hasMany('App\Models\BlackListModel');
    }

    public function Article() {
        return $this->belongsTo('App\Models\ArticleModel');
    }
}
