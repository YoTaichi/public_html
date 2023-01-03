<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ArticleModel;
use App\Models\ArticleFloorModel;
use App\Models\GoodModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GoodController extends Controller
{
    public function good($id)
    {

        /* 找user_id跟article_id  */
        $find = GoodModel::where('user_id', '=', auth()->user()->id)->where('article_id', '=', $id);
        $article = ArticleModel::find($id);
        $article_user = $article->user_id;
        $article_money = User::find($article_user)->money;
        /* 用get()沒值回傳empty */
        if ($article_user <> auth()->user()->id) {
            if ($find->get()->isEmpty()) {
                GoodModel::create([
                    'user_id' => auth()->user()->id,
                    'article_id' => $id,
                    'floor' => 1
                ]);
                User::where('id', auth()->user()->id)->update(['money' => auth()->user()->money - 2]);
                User::where('id', $article_user)->update(['money' => $article_money + 2]);
                $article->increment('good');
            } else {
                $find->delete();
                User::where('id', auth()->user()->id)->update(['money' => auth()->user()->money + 2]);
                User::where('id', $article_user)->update(['money' => $article_money - 2]);
                $article->decrement('good');
            }
        }
        return redirect()->back();
    }

    public function good_floor($id)
    {
        /* 找user_id跟article_id  */
        $articlefloor = ArticleFloorModel::find($id);
        $article_id = $articlefloor->article_id;
        $article_user = $articlefloor->user_id;
        $floor = $articlefloor->floor;
        $find = GoodModel::where('user_id', auth()->user()->id)->where('article_id', $article_id)->where('floor',$floor);
        $article_money = User::find($article_user)->money;
        /* 用get()沒值回傳empty */
        if ($article_user <> auth()->user()->id) {
            if ($find->get()->isEmpty()) {
                GoodModel::create([
                    'user_id' => auth()->user()->id,
                    'article_id' => $article_id,
                    'floor' => $floor
                ]);
                User::where('id', auth()->user()->id)->update(['money' => auth()->user()->money - 2]);
                User::where('id', $article_user)->update(['money' => $article_money + 2]);
                $articlefloor->increment('good');
            } else {
                $find->delete();
                User::where('id', auth()->user()->id)->update(['money' => auth()->user()->money + 2]);
                User::where('id', $article_user)->update(['money' => $article_money - 2]);
                $articlefloor->decrement('good');
            }
        }
        return redirect()->back();
    }
}
