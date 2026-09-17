<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class CategoryController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $label = $request->label;
        $description = $request->description;
        $slug = Str::slug($label,'-');

        $validated = $request->validate([
            'label' => 'required|unique:categories|min:3',
            'description' => 'nullable|min:10'
        ]);

        // dd($validated);

        // $category = new Category();

        // $category->label = $label;
        // $category->description = $description;
        // $category->slug = $slug;

        // $category->save();

        Category::create([
            'label' => $label,
            'description' => $description,
            'slug' => $slug
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        dd($category);
        dd("afficher une ressource");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'label' => ['required',Rule::unique('categories')->ignore($category->id),'min:3'],
            'description' => ['nullable','min:10']
        ]);

        $category->update([
            'label' => $validated['label'],
            'description' => $validated['description'],
            'slug' => $slug = Str::slug($request->$validated['label'],'-')
        ]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    public static function middleware(): array
    {
        return [
            new Middleware('permission:categorie.view', only:['index','show']),
            new Middleware('permission:categorie.create', only:['create','store']),
            new Middleware('permission:categorie.update', only:['edit','update']),
            new Middleware('permission:categorie.delete', only:['destroy']),
        ];
    }
}
