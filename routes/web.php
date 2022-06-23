<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/article/category/{category}/show', [ArticleController::class, 'showCategory'])->name('article.category');
Route::get('/dettaglio/article/{article}', [ArticleController::class, 'showArticle'])->name('article.show');
Route::get('/tutti/articles', [ArticleController::class, 'indexArticle'])->name('article.index');
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/lavoraconnoi', [RevisorController::class , 'lavoraconnoi'])->name('lavoraconnoi');
Route::post('/contact/send',[ContactController::class,'sendMail'])->name('contact.send');
Route::get('/ricerca/articolo', [PublicController::class, 'searchArticles'])->name('articles.search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');

Route::middleware('auth','verified')->group(function(){
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
});


Route::middleware('isRevisor')->group(function(){
    Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
    Route::get('/revisor/show/{article}', [RevisorController::class, 'indexArticle'])->name('revisor.show');
    Route::patch('/accetta/articolo/{article}', [RevisorController::class, 'acceptArticle'])->name('revisor.accept_article');
    Route::patch('/rifiuta/articolo/{article}', [RevisorController::class, 'rejectArticle'])->name('revisor.reject_article');
    Route::patch('/ritorna/articolo/{article}', [RevisorController::class, 'returnArticle'])->name('revisor.return_article');

});


