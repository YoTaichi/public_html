<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LeftRightGameRoundModel extends Model
{

    protected $table = 'left_right_game_round';
    protected $fillable = [ 'round', 'winner','teamA_bet','teamB_bet', 'created_at', 'updated_at'];

    public function LRG () {
        return $this->hasMany('App\Models\LeftRightGameModel' , 'left_right_game_round_id');
    }
}
