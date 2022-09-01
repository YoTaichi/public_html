<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\MessageModel;
use App\Models\ArticleTagModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\FunctionLike;
use App\Models\User;

class ArticlesController extends Controller
{
    public function __consrtruct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        /* desc 新的先 */
        $articles = ArticleModel::orderBy('id', 'desc')->get();
        return view('app', ['articles' => $articles] );
    }

    public function show($id)
    {

        $article = ArticleModel::with('message')->find($id);
        return view('article.show', ['article' => $article]);
    }

    public function create()
    {
        return view('nav.Po');
    }

    public function store(Request $request)
    {

        $content = $request->validate([
            'title' => 'required',
            'detail' => 'required|min:10',

        ]);
        
        $id = ArticleModel::create([
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'detail' => request('detail'),
            'sex' => request('sex')
        ])->id;


        ArticleTagModel::create([
            'tag' => request('tag'),
            'articles_id' => $id
        ]);


        return redirect()->route('articles.index')->with('notice', '文章新增成功');
    }

    public function edit($id)
    {
        $article = auth()->user()->articles->find($id);
        return view('article.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = auth()->user()->articles->find($id);
        $content = $request->validate([
            'title' => 'required',
            'detail' => 'required|min:10',
        ]);

        $tag = $request->validate([
            'tag' => 'required',
        ]);

        /*      $article_tag->update($tag); */

        $article->update($content);
        return redirect()->route('articles.index');
    }

    public function destroy($id){
        $article = auth()->user()->articles->find($id);
        $article->delete();

        return redirect()->route('articles.index');
    }




    /* 讚 */
    public function good($id)
    {
        /*         DB::table('article')->increment('good'); */
        $query = DB::table('article')
            ->where('id', '=', $id);

        $query->increment('good');
        return redirect()->back();
    }
    /* 倒讚 */
    public function bad($id)
    {
        /*         DB::table('article')->increment('good'); */

        $query = DB::table('article')
            ->where('id', '=', $id);

        $query->increment('bad');
        return redirect()->back();
    }

}
