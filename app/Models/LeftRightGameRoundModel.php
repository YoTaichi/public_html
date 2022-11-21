<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LeftRightGameRoundModel extends Model
{   

    protected $table = 'left_right_game_round';
    protected $fillable = [ 'round', 'winner','loser', 'created_at', 'updated_at'];


}
