<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\ArticleTagModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function find($id)
    {
        $article = ArticleModel::with('message')->find($id);
        return view('search.find', ['article' => $article]);
        
    }


    public function store(Request $request){

        $content = $request->validate([
            'search' => 'required',
        ]);
        $articles = ArticleModel::orderBy('articles.id', 'desc')
                                ->join('articles_tag', 'articles.id', '=', 'articles_tag.articles_id')
                                ->where('articles_tag.tag', 'like', $content)
                                ->get();

        
        return view('search.index', ['articles' => $articles]);

    }

}
