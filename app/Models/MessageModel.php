<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'message';
    protected $fillable = ['message', 'images', 'floor', 'article_id', 'article_floor_id' ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function article() {
        return $this->belongsTo('App\Models\ArticleModel');
    }

    public function Article_floor() {
        return $this->belongsTo('App\Models\ArticleFloorModel');
    }
}
