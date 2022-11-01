<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlackListModel;
use App\Models\GameModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    public function index()
    {
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $aa = 'aa';
        $data = [
            'blacklists' => $blacklists,
            'aa' => $aa
        ];

        return view('game.left_right',['data' => $data]);
    }

}