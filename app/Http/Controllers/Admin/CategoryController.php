<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

/* para crearlo y que cree los 7 metodos para hace un CRUD uso:

php artisan make:controller Admin/CategoryController[para indicarle donde crearlo] -r [para que cree los metodos del CRUD] */

class CategoryController extends Controller
{
    
    /* control de acceso no permitido a usuarios */
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
        
    }

    public function index()
    {
        $categories = Category::all(); 
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.edit',$category)->with('info','la categoria se agrego con exito');
    }
     
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            'slug'=> "required|unique:categories,slug,$category->id"
        ]);
        $category->update($request->all());
        return redirect()->route('admin.categories.edit',$category)->with('info','la categoria se actualizo con exito');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info','la categoria se elimino con exito');
    }
}
