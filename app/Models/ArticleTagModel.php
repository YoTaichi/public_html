<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ArticleTagModel extends Model
{   

    protected $table = 'article_tag';
    protected $fillable = ['tag', 'article_id', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function article() {
        return $this->belongsTo('App\Models\ArticleModel');
    }

}
