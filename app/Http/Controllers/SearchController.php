<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\ArticleTagModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BlackListModel;

class SearchController extends Controller
{
    public function find($id)
    {
        $article = ArticleModel::with('message')->find($id);
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();

        $data = [
            'article' => $article,
            'blacklists' => $blacklists
        ];
        return view('search.find', ['data' => $data]);
    }


    public function store(Request $request)
    {
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $sex_set = Auth()->user()->sex_set;
        $content = $request->validate([
            'search' => 'required',
        ]);

        if ($sex_set === 0) {

            $articles = ArticleModel::orderBy('article.id', 'desc')
                ->join('article_tag', 'article.id', '=', 'article_tag.article_id')
                ->orwhere('article_tag.tag', 'like', $content)
                ->orwhere('article.title', 'like', $content)
                ->where('sex', 0)
                ->get();
        } elseif ($sex_set === 1) {
            $articles = ArticleModel::orderBy('article.id', 'desc')
                ->join('article_tag', 'article.id', '=', 'article_tag.article_id')
                ->where('article_tag.tag', 'like', $content)
                ->where('sex', 1)
                ->get();
        } else {
            $articles = ArticleModel::orderBy('article.id', 'desc')
                ->join('article_tag', 'article.id', '=', 'article_tag.article_id')
                ->where('article_tag.tag', 'like', $content)
                ->get();
        }



        $articles = ArticleModel::orderBy('article.id', 'desc')
            ->join('article_tag', 'article.id', '=', 'article_tag.article_id')
            ->where('article_tag.tag', 'like', $content)
            ->get();


        $data = [
            'articles' => $articles,
            'blacklists' => $blacklists
        ];
        return view('search.index', ['data' => $data]);
    }
}
