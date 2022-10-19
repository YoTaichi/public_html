<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\ArticleFloorModel;
use App\Models\MessageModel;
use App\Models\BlackListModel;
use App\Models\ArticleTagModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\FunctionLike;
use App\Models\User;
/* 圖片用 */
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Intervention\Image\EncodedImage;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;
use Illuminate\Support\Str;
use Psy\Readline\Hoa\Console;

class ArticleFloorController extends Controller
{
    public function store(Request $request)
    {

        $requestData = $request->all();
 
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = Storage::disk('myfile')->putFile('news', $file);
            $requestData['img'] = '/upload/' . $path;
        }
        $parser = xml_parser_create();
        // 將字串進行解析
        xml_parse_into_struct($parser, $request->detail, $tags);
        // $news->content為要解析的東西
        // $tags為解析後html內的各個標籤
        foreach ($tags as $tag) {
            // 找出所有img標籤
            if ($tag['tag'] == 'IMG') {
                // 取出src
                $first_src = $tag['attributes']['SRC'];
                //dd($first_src);

                // 先判斷有沒有base64
                if (strpos($first_src, ';base64,') !== false) {
                    // **base64 to img 並儲存，取得path**
                    $path = $this->base64fileUpload($first_src, 'storage');
                    // **$request->content 中目前的$first_src 取代成path**
                    $requestData['detail'] = $this->replace_first_str($first_src, $path, $requestData['detail'], 1);
                    $requestData['image'] = $path;
                }
            }
        }
        /* 存article , 抓新文章ID */
        ArticleFloorModel::create($requestData);

        return redirect()->back();
    }

    public function edit($id)
    {
        $article = auth()->user()->articles->find($id);
        $article_floor = 
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        return view('article.edit_floor', ['article' => $article, 'blacklists' => $blacklists]);
    }

    public function update(Request $request, $id)
    {
        $article = auth()->user()->articles->find($id);
        $tag_delete = ArticleTagModel::where('article_id', $id)->delete();

        $requestData = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = Storage::disk('myfile')->putFile('news', $file);
            $requestData['img'] = '/upload/' . $path;
        }
        $parser = xml_parser_create();
        // 將字串進行解析
        xml_parse_into_struct($parser, $request->detail, $tags);
        // $news->content為要解析的東西
        // $tags為解析後html內的各個標籤
        foreach ($tags as $tag) {
            // 找出所有img標籤
            if ($tag['tag'] == 'IMG') {
                // 取出src
                $first_src = $tag['attributes']['SRC'];
                //dd($first_src);

                // 先判斷有沒有base64
                if (strpos($first_src, ';base64,') !== false) {
                    // **base64 to img 並儲存，取得path**
                    $path = $this->base64fileUpload($first_src, 'storage');
                    // **$request->content 中目前的$first_src 取代成path**
                    $requestData['detail'] = $this->replace_first_str($first_src, $path, $requestData['detail'], 1);
                    $requestData['image'] = $path;
                }
            }
        }
        /* 切割#tag */
        $addtags = explode(' ', request('tag'));
        /* 陣列第一個數是空白 unset移除第一個數 */
        /* unset($addtags[0]); */
        /* 存tag */
        foreach ($addtags as $addtag) {
            ArticleTagModel::create([
                'tag' => $addtag,
                'article_id' => $id
            ]);
        }

        $article->update($requestData);
        return redirect()->route('articles.show',['article' => $article]);
    }


    /* 上傳圖片轉檔 */
    private function replace_first_str($search_str, $replacement_str, $src_str)
    {
        return (false !== ($pos = strpos($src_str, $search_str))) ? substr_replace($src_str, $replacement_str, $pos, strlen($search_str)) : $src_str;
    }

    private function base64fileUpload($base64, $dir)
    {

        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/')) {
            mkdir('upload/');
        }
        //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
        if (!is_dir('upload/' . $dir)) {
            mkdir('upload/' . $dir);
        }

        $decoder = new Base64ImageDecoder($base64, ['jpeg', 'jpg', 'png', 'gif']);
        $filename = strtoupper(Str::uuid()) . "." . $decoder->getFormat();
        $path = '/' . $dir . '/' . $filename;
        Storage::put($filename, $decoder->getDecodedContent());
        Storage::move('/' . $filename, '/public/' . $filename);


        //回傳 資料庫儲存用的路徑格式
        return $path;
    }
}