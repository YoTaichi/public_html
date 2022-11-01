<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ArticleModel;
use App\Models\GoodModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GoodController extends Controller
{
    public function good($id)
    {
        /* 找user_id跟article_id  */
        $find = GoodModel::where('user_id','=',auth()->user()->id)->
                            where('article_id','=',$id);

        /* 用get()沒值回傳empty */
        if($find->get()->isEmpty()){
                GoodModel::create([
                    'user_id' => auth()->user()->id,
                    'article_id' => $id
                ]);
        }else{
            $find->delete();
        }

        return redirect()->back();
    }

}