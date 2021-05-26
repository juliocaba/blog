<?php
/* para crearlo uso: php artisan make:controller Admin/TagController -r [para darle los 7 metodos del crud] */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /* control de acceso no permitido a usuarios */
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
        
    }
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    
    public function create()
    {
        $colors = [
            'red'=>'color rojo',
            'yellow'=>'color amarillo',
            'green'=>'color verde',
            'blue'=>'color azul',
            'indigo'=>'color indigo',
            'purple'=>'color purpura',
            'pink'=>'color rosa'

        ];
        return view('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:tags',
            'color'=>'required'
        ]);
        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit',compact('tag'))->with('info','la etiqueta se creo con exito');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red'=>'color rojo',
            'yellow'=>'color amarillo',
            'green'=>'color verde',
            'blue'=>'color azul',
            'indigo'=>'color indigo',
            'purple'=>'color purpura',
            'pink'=>'color rosa'

        ];
        return view('admin.tags.edit', compact('tag','colors'));
    }

    
    public function update(Request $request,Tag $tag)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:tags,slug,$tag->id",
            'color'=>'required'
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info','la etiqueta se actualiza con exito');
    }

    public function destroy(Tag $tag)
    {
      $tag->delete();
      return redirect()->route('admin.tags.index')->with('info','la etiqueta se elimino con exito');;
    }
}
