<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BlackListModel;
use App\Models\SignInModel;
use App\Models\LeftRightGameModel;
use App\Models\LeftRightGameRoundModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    public function index()
    {

        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $yesterday = SignInModel::find(Auth()->user()->id);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;
        $lastround = LeftRightGameRoundModel::latest()->first();
        /* Round */
        /* 結算 */
        if (now()->dayOfYear - $lastround->updated_at->dayOfYear != 0) {
            $teamAAll = LeftRightGameModel::where('team', 'A')->where('round', $lastround->round)->sum('bet'); 
            $teamBAll = LeftRightGameModel::where('team', 'B')->where('round', $lastround->round)->sum('bet');
            $teamAbet = LeftRightGameModel::where('user_id', auth()->user()->id)->where('team', 'A')->where('round', $lastround->round)->get()[0]->bet;
            $teamBbet = LeftRightGameModel::where('user_id', auth()->user()->id)->where('team', 'B')->where('round', $lastround->round)->get()[0]->bet;
            /* TeamA 贏 TeamB */
            if ($teamAAll > $teamBAll){
                $get = $teamBAll * $teamAbet / $teamAAll + $teamAbet;
                User::where('id',auth()->user()->id)->increment('money' , $get);
            /* TeamA 平手 TeamB */
            }elseif($teamAAll === $teamBAll){
                $get = $teamAbet + $teamBbet ;
                User::where('id',auth()->user()->id)->increment('money' , $get);
            /* TeamA 輸 TeamB */
            }else{
                $get = $teamAAll * $teamBbet / $teamBAll + $teamBbet;
                User::where('id',auth()->user()->id)->increment('money' , $get);
            }
            LeftRightGameRoundModel::firstOrCreate([
                'round' => $lastround->round + 1
            ]);
        }
        $newround = LeftRightGameRoundModel::latest()->first();
        /* 進入頁面先創資料 */
        LeftRightGameModel::firstOrCreate(['user_id' => Auth()->user()->id, 'team' => 'A', 'round' => $newround->round]);
        LeftRightGameModel::firstOrCreate(['user_id' => Auth()->user()->id, 'team' => 'B', 'round' => $newround->round]);

        /* 統計所有AB金額 */
        $teamAAll = LeftRightGameModel::where('team', 'A')->where('round', $newround->round)->sum('bet');
        $teamBAll = LeftRightGameModel::where('team', 'B')->where('round', $newround->round)->sum('bet');

        if ($teamAAll + $teamBAll != 0) {
            $teamAper = number_format($teamAAll / ($teamAAll + $teamBAll), 3);
            $teamBper = 1 - $teamAper;
        } else {
            $teamAper = 0.5;
            $teamBper = 0.5;
        }

        /* 個人AB金額 */
        $teamAbet = LeftRightGameModel::where('user_id', auth()->user()->id)->where('team', 'A')->where('round', $newround->round)->get();
        $teamBbet = LeftRightGameModel::where('user_id', auth()->user()->id)->where('team', 'B')->where('round', $newround->round)->get();

        $data = [
            'blacklists' => $blacklists,
            'datecount' => $datecount,
            'teamAAll' => $teamAAll,
            'teamBAll' => $teamBAll,
            'teamAper' => $teamAper,
            'teamBper' => $teamBper,
            'teamAbet' => $teamAbet,
            'teamBbet' => $teamBbet,
            'newround' => $newround->round
        ];

        if (now()->dayOfYear - $yesupdate->dayOfYear === 0) {
            /* 簽過 */
            return view('game.left_right', ['data' => $data, 'yesorno' => 0]);
        } else {
            /* 簽到 */
            /* 簽到count+1 */
            $yesterday->increment('count');
            return view('game.left_right', ['data' => $data, 'yesorno' => 1]);
        }
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $user_money = User::find(auth()->user()->id)->money;

        if ($user_money > $requestData['bet']) {
            /* 扣錢 */
            User::where('id', auth()->user()->id)->decrement('money', $requestData['bet']);
            /* 增下注額 */
            LeftRightGameModel::where('user_id', auth()->user()->id)
                                ->where('team', $requestData['team'])
                                ->increment('bet', $requestData['bet']);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
