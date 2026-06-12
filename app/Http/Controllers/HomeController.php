<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function articlesListPage()
    {
        $articles = Article::all();
        return view('clients.index', compact('articles'));
    }

    public function homePage(Request $request){
        return view('home');
    }

    public function checkOutPage(){
        return view('checkOut');
    }
}
