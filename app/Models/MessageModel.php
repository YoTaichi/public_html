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
    protected $fillable = ['message', 'images', 'articles_id' ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function Article() {
        return $this->belongsTo('App\Models\ArticleModel');
    }
}
