<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LeftRightGameModel extends Model
{   

    protected $table = 'left_right_game';
    protected $fillable = ['user_id', 'article_id', 'bet', 'round', 'team', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
