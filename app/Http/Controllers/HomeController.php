<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function articlesListPage()
    {
        $articles = Article::with('category')->get();
        return view('clients.index', compact('articles'));
    }

    public function homePage(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category');

        $query = Article::with('category');

        if ($search !== null && $search !== '') {
            $query->where('label', 'like', '%' . $search . '%');
        }

        if ($categoryId !== null && $categoryId !== '') {
            $query->where('category_id', $categoryId);
        }

        $articles = $query->latest()->get();
        $categories = Category::all();

        return view('home', compact('articles', 'categories', 'search', 'categoryId'));
    }
}
