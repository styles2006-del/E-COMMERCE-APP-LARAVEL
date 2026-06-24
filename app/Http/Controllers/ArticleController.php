<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $label = $request->label;
        $prix = $request->prix;
        $quantity = $request->quantity;
        $categorie = $request->category;
        $description = $request->description;


        // $path = $request->file('cover_field')->storeAs('articles_cover','test');
        // dump($path);
        // dd($request);


        $validated = $request->validate([
            'label' => 'required|unique:articles|min:3',
            'prix' => 'required|numeric|min:1',
            'quantity' => 'integer|min:0',
            'description' => 'nullable|min:10',
            'category' => 'required|exists:categories,id',
            'cover_field' => ['mimes:jpg,jpeg', 'required']
        ]);


        $slug = Str::slug($label, '-');
        $cover_file_upload = $request->file('cover_field');
        $cover_new_file_name = $slug . '.' . $cover_file_upload->extension();
        $cover_path = $cover_file_upload->storeAs('articles_cover', $cover_new_file_name, 'public');



        Article::create([
            'label' => $label,
            'current_price' => $prix,
            'quantity' => $quantity,
            'description' => $description,
            'slug' => $slug,
            'cover' => $cover_path,
            'category_id' => $request->category,
        ]);

        return redirect()->route('admin.articles.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'label' => ['required', Rule::unique('articles')->ignore($article->id), 'min:3'],
            'prix' => ['required', 'numeric', 'min:1'],
            'quantity' => ['integer', 'min:0'],
            'description' => ['nullable', 'min:10'],
            'category' => 'required|exists:categories,id',
            'cover_field' => ['mimes:jpg,jpeg', 'nullable']
        ]);

        $slug = Str::slug($validated['label'], '-');

        $cover_path ='-';
        if (isset($validated['cover_field'])) {
            if (isset($article->cover)) {
                Storage::disk('public')->delete($article->cover);
            }
            $cover_file_upload = $request->file('cover_field');
            $cover_new_file_name = $slug . '.' . $cover_file_upload->extension();
            $cover_path = $cover_file_upload->storeAs('articles_cover', $cover_new_file_name, 'public');
        } else {
            $cover_path = $article->cover;
        }

        $article->update([
            'label' => $validated['label'],
            'current_price' => $validated['prix'],
            'quantity' => $validated['quantity'],
            'description' => $validated['description'],
            'slug' => $slug,
            'cover' => $cover_path,
            'category_id' => $request->category,

        ]);

        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        if (isset($article->cover)) {
            Storage::disk('public')->delete($article->cover);
        }
        return redirect()->route('admin.articles.index');
    }
    public static function middleware(): array
    {
        return [
            new Middleware('permission:article.view', only:['index','show']),
            new Middleware('permission:article.create', only:['create','store']),
            new Middleware('permission:article.update', only:['edit','update']),
            new Middleware('permission:article.delete', only:['destroy']),
        ];
    }
}
