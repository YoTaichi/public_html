<?php

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::resource('articles', 'App\Http\Controllers\ArticlesController'::class);
Route::resource('article_floor', 'App\Http\Controllers\ArticleFloorController'::class);
Route::resource('game', 'App\Http\Controllers\GameController'::class);
Route::resource('ball', 'App\Http\Controllers\BallController'::class);
Route::resource('register', 'App\Http\Controllers\RegisterController'::class);
Route::resource('message', 'App\Http\Controllers\MessageController'::class);
Route::resource('blacklist', 'App\Http\Controllers\BlackListController'::class);
Route::resource('search', 'App\Http\Controllers\SearchController'::class)->only('store');
Route::get('/', function () { 
    return view('welcome');
});
/* 買鑽 */
Route::get('/buygem', ['App\Http\Controllers\BuyController'::class, 'gem'])->name('buy.gem_index');
Route::get('/buygem/pay', ['App\Http\Controllers\BuyController'::class, 'get_paid'])->name('buy.get_paid');
Route::get('/buygem/get1', ['App\Http\Controllers\BuyController'::class, 'get_paid_one'])->name('buy.get_paid_one');
Route::get('/buygem/get7', ['App\Http\Controllers\BuyController'::class, 'get_paid_two'])->name('buy.get_paid_two');
Route::get('/buygem/get12', ['App\Http\Controllers\BuyController'::class, 'get_paid_twelve'])->name('buy.get_paid_twelve');
Route::get('/buygem/get25', ['App\Http\Controllers\BuyController'::class, 'get_paid_twentyfive'])->name('buy.get_paid_twentyfive');
Route::get('/buygem/get52', ['App\Http\Controllers\BuyController'::class, 'get_paid_fiftytwo'])->name('buy.get_paid_fiftytwo');
Route::get('/buygem/get80', ['App\Http\Controllers\BuyController'::class, 'get_paid_eighty'])->name('buy.get_paid_eighty');
/* 買錢 */
Route::get('/buymoney', ['App\Http\Controllers\BuyController'::class, 'money'])->name('buy.money_index');
Route::post('/buymoney/get', ['App\Http\Controllers\BuyController'::class, 'buy_money'])->name('buy.money');
/* 搜尋 */
Route::get('/search/{id}', ['App\Http\Controllers\SearchController'::class, 'find'])->name('search.find');
/* 讚、倒讚 */
Route::get('/good/{id}', ['App\Http\Controllers\GoodController'::class, 'good'])->name('good');
Route::get('/bad/{id}', ['App\Http\Controllers\BadController'::class, 'bad'])->name('bad');
/* 文章顯示 */
Route::get('/sex_all', ['App\Http\Controllers\ArticlesController'::class, 'sex_all'])->name('articles.sex_all');
Route::get('/sex_only', ['App\Http\Controllers\ArticlesController'::class, 'sex_only'])->name('articles.sex_only');
Route::get('/sex_no', ['App\Http\Controllers\ArticlesController'::class, 'sex_no'])->name('articles.sex_no');
Route::get('/sign_in', ['App\Http\Controllers\ArticlesController'::class, 'sign_in'])->name('articles.sign_in');
/* 黑名單 */
Route::post('/blacklist', ['App\Http\Controllers\BlackListController'::class, 'blacklist'])->name('blacklist');
Route::post('/blacklist_del/{id}', ['App\Http\Controllers\BlackListController'::class, 'blacklist_del'])->name('blacklist.blacklist_del');
/* Route::post('/store', ['App\Http\Controllers\ToolBoxController'::class, 'store'])->name('toolbox.store'); */


Route::prefix('admin')->middleware('auth')->group(function ()
{
   // ...前略 
   Route::prefix('summernote')->group(function(){
       Route::post('/store','ToolBoxController@summernoteStore');
       Route::post('/delete','ToolBoxController@summernoteDelete');
   });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', ['App\Http\Controllers\ProfileController'::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', ['App\Http\Controllers\ProfileController'::class, 'update'])->name('profile.update');
    Route::delete('/profile', ['App\Http\Controllers\ProfileController'::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
