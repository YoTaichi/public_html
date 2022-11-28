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
Route::get('/search/{id}', ['App\Http\Controllers\SearchController'::class, 'find'])->name('search.find');
/* 讚、倒讚 */
Route::get('/good/{id}', ['App\Http\Controllers\GoodController'::class, 'good'])->name('good');
Route::get('/bad/{id}', ['App\Http\Controllers\BadController'::class, 'bad'])->name('bad');
/* 文章顯示 */
Route::get('/sex_all', ['App\Http\Controllers\ArticlesController'::class, 'sex_all'])->name('articles.sex_all');
Route::get('/sex_only', ['App\Http\Controllers\ArticlesController'::class, 'sex_only'])->name('articles.sex_only');
Route::get('/sex_no', ['App\Http\Controllers\ArticlesController'::class, 'sex_no'])->name('articles.sex_no');
Route::get('/sign_in', ['App\Http\Controllers\ArticlesController'::class, 'sign_in'])->name('articles.sign_in');
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
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
