<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackListModel extends Model
{
    use HasFactory;

    protected $table = 'blacklist';
    protected $fillable = ['user_id','blacklist' ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function article() {
        return $this->belongsTo('App\Models\ArticleModel');
    }
}