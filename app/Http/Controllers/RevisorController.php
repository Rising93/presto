<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{

    public function index(){
        $article_to_check = Article::where('is_accepted', null)->get()->all();
        $article_rejected = Article::where('is_accepted', 0)->get()->all();
        return view('revisor.index', compact('article_to_check', 'article_rejected'));
    }

    public function indexArticle(Article $article){
        
        return view('revisor.show', compact('article'));
    }

    public function acceptArticle(Article $article){
        $article->setAccepted(true);
        return redirect()->route('revisor.index')->with('message', 'Articolo accettato con successo!');
    }

    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        return redirect()->route('revisor.index')->with('message', 'Articolo rifiutato!');
    }

    public function returnArticle(Article $article){
        $article->setAccepted(NULL);
        return redirect()->route('revisor.index')->with('message', 'Articolo ripreso con successo!');
    }

    
    public function makeRevisor (User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('revisor', "Complimenti, l'utente da te selezionato è diventato un revisore");
    }

    public function lavoraconnoi ()
    {
        return view('lavoraconnoi');
    }
}
