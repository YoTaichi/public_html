<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ArticleModel;
use App\Models\BadModel;
use App\Models\ArticleFloorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BadController extends Controller
{
    public function bad($id)
    {
        /* 找user_id跟article_id  */
        $find = BadModel::where('user_id', '=', auth()->user()->id)->where('article_id', '=', $id);
        $article = ArticleModel::find($id);
        $article_user = $article->user_id;

        /* 用get()沒值回傳empty */
        if ($article_user <> auth()->user()->id) {
            if ($find->get()->isEmpty()) {
                BadModel::create([
                    'user_id' => auth()->user()->id,
                    'article_id' => $id,
                    'floor' => 1
                ]);
                $article->increment('bad');
            } else {
                $find->delete();
                $article->decrement('bad');
            }
        }
        return redirect()->back();
    }

    public function bad_floor($id)
    {
        /* 找user_id跟article_id  */
        $articlefloor = ArticleFloorModel::find($id);
        $article_id = $articlefloor->article_id;
        $article_user = $articlefloor->user_id;
        $floor = $articlefloor->floor;
        $find = BadModel::where('user_id', auth()->user()->id)->where('article_id', $article_id)->where('floor', $floor);
        $article_money = User::find($article_user)->money;

        /* 用get()沒值回傳empty */
        if ($article_user <> auth()->user()->id) {
            if ($find->get()->isEmpty()) {
                BadModel::create([
                    'user_id' => auth()->user()->id,
                    'article_id' => $article_id,
                    'floor' => $floor
                ]);
                $articlefloor->increment('bad');
            } else {
                $find->delete();
                $articlefloor->decrement('bad');
            }
        }
        return redirect()->back();
    }
}
