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
Route::resource('register', 'App\Http\Controllers\RegisterController'::class);
Route::resource('message', 'App\Http\Controllers\MessageController'::class);
Route::resource('search', 'App\Http\Controllers\SearchController'::class)->only('store');
Route::get('/', function () { 
    return view('welcome');
});
Route::get('/search/{id}', ['App\Http\Controllers\SearchController'::class, 'find'])->name('search.find');
Route::get('/bad/{id}', ['App\Http\Controllers\ArticlesController'::class, 'bad'])->name('articles.bad');
Route::get('/good/{id}', ['App\Http\Controllers\GoodController'::class, 'good'])->name('good');
Route::get('/bad/{id}', ['App\Http\Controllers\BadController'::class, 'bad'])->name('bad');

Route::post('/store', ['App\Http\Controllers\ToolBoxController'::class, 'store'])->name('toolbox.store');
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

require __DIR__.'/auth.php';
