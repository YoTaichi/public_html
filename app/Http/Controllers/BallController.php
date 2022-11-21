<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ArticleModel;
use App\Models\BadModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ArticleFloorModel;
use App\Models\MessageModel;
use App\Models\BlackListModel;
use App\Models\ArticleTagModel;
use App\Models\SignInModel;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\FunctionLike;
use Carbon\Carbon;

class BallController extends Controller
{
    public function index()
    {
        /* sex_sex  =0顯示普通  =1顯示瑟瑟  =2全部顯示 */
        $sex_set = Auth()->user()->sex_set;
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        /* desc 新的先 */
        if ($sex_set === 0) {

            $articles = ArticleModel::orderBy('id', 'desc')
                ->whereHas('article_tag', function ($q) {
                    $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
                    for ($i = 0; $i < $blacklists->count(); $i++) {
                        $q->where('tag', '<>', $blacklists[$i]->blacklist);
                    }
                })
                ->where('sex', 0)
                ->get();
        } elseif ($sex_set === 1) {
            $articles = ArticleModel::orderBy('id', 'desc')
                ->whereHas('article_tag', function ($q) {
                    $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
                    for ($i = 0; $i < $blacklists->count(); $i++) {
                        $q->where('tag', '<>', $blacklists[$i]->blacklist);
                    }
                })
                ->where('sex', 1)
                ->get();
        } else {
            $articles = ArticleModel::orderBy('id', 'desc')
                ->whereHas('article_tag', function ($q) {
                    $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
                    for ($i = 0; $i < $blacklists->count(); $i++) {
                        $q->where('tag', '<>', $blacklists[$i]->blacklist);
                    }
                })
                ->get();
        }

        $yesterday = SignInModel::find(Auth()->user()->id);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;

        $data = [
            'articles' => $articles,
            'blacklists' => $blacklists,
            'sex_set' => $sex_set,
            'datecount' => $datecount
        ];

        $user = User::find(1);
        if (now()->dayOfYear - $yesupdate->dayOfYear === 0) {
            /* 簽過 */
            return view('ball', ['data' => $data, 'yesorno' => 0]);
        } else {
            /* 簽到 */
            /* 簽到count+1 */
            $yesterday->increment('count');
            return view('ball', ['data' => $data, 'yesorno' => 1]);
        }

    }
}
