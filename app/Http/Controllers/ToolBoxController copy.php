<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Intervention\Image\EncodedImage;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;
use Illuminate\Support\Str;

class ToolBoxController extends Controller
{

    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = Storage::disk('myfile')->putFile('news', $file);
            $requestData['img'] = '/upload/' . $path;
            //dd($requestData);
        }
        //dd($requestData);
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
                    $path = $this->base64fileUpload($first_src, 'summernote');
                    /* dd( $path ); */
                    if (is_null($path)) {
                        ArticleModel::create($requestData);
                        return redirect()->route('articles.index');
                    } else {
                        // **$request->content 中目前的$first_src 取代成path**
                        $requestData['detail'] = $this->replace_first_str($first_src, $path, $requestData['detail'], 1);
                        //dd($requestData['detail']);
                    }
                }
            }
        }
        //dd($requestData);
        ArticleModel::create($requestData);

        return redirect()->route('articles.index');
    }
    // 別人的輪子
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
        // 將$base64去蕪存菁 剩下逗號之後的編碼
        /* $base64_code = preg_replace('/^data:image\/\w+;base64,/', '', $base64); */
        $dataUri = 'data:image/gif;base64,R0lGODlhLAH6AOZ/AMyokXJMK0uE...';
        $decoder = new Base64ImageDecoder($base64, ['jpeg', 'jpg', 'png', 'gif']);
        $fileName = strtoupper(Str::uuid()) . "." . $decoder->getFormat();
        Storage::put($fileName, $decoder->getDecodedContent());
        dd(123);

       

        // 取得檔案的副檔名 extension
        $type = explode(';', $base64)[0];
        $extension = explode('/', $type)[1]; // png or jpg etc

        if ($extension == 'gif') {
            // 檔案名稱會被重新命名
            // 產生檔名
            $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
            // 產生路徑
            $path = '/upload/' . $dir . '/' . $filename;
            // 使用intervetion image套件 儲存到指定路徑
            /* $img = Image::make($base64); */
            $img = Image::make($source);
            // resize 防止圖片尺寸過大 統一寬度為1920
            $img->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // 儲存到指定路徑 80為壓縮品質

            $img->save(public_path() . $path, 80);

            //回傳 資料庫儲存用的路徑格式
            return $path;
        } else {

            // 檔案名稱會被重新命名
            // 產生檔名
            $filename = strval(time() . md5(rand(100, 200))) . '.' . $extension;
            // 產生路徑
            $path = '/upload/' . $dir . '/' . $filename;
            // 使用intervetion image套件 儲存到指定路徑
            /* $img = Image::make($base64); */
            $img = Image::make($source);
            // resize 防止圖片尺寸過大 統一寬度為1920
            $img->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // 儲存到指定路徑 80為壓縮品質

            $img->save(public_path() . $path, 80);

            //回傳 資料庫儲存用的路徑格式
            return $path;
        }
    }
}
