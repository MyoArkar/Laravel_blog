<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ArticleController::class,'index']);

/*Routes
Route::get('/articles', function () {
    return 'Article List';
});

Route::get('/articles/detail', function (){
    return 'Article Detail';
})->name('article.detail');

Dynamic Route
Route::get('articles/detail/{id}', function ($id){
    return "Article Detail - $id";
});

Route Name
/*
Route::get('/articles/detail', function (){
    return 'Article Detail';
})->name('article.detail');

Route::get('articles/more', function (){
    return redirect('/articles/detail');
});


Route::get('articles/more', function (){
    return redirect()->route('article.detail');
});
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/detail/{id}',[
    ArticleController::class, 'detail'
]);

Route::get('/articles/add',[ArticleController::class, 'add']);

Route::post('/articles/add',[
    ArticleController::class,'create'
]);

Route::get('/articles/delete/{id}',[
    ArticleController::class,'delete'
]);

Route::post('/comments/add',[
    CommentController::class,'create'
]);

Route::get('/comments/delete/{id}',[
    CommentController::class,'delete'
]);