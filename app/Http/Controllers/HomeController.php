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
        $search = $request->input('search');
        $query = Article::query();
        if ($search !== null) {
            $query->where('label','like','%'.$search.'%');
        }
        $articles = $query->paginate(1);
        return view('home',compact('articles','search'));
    }

}
