<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
/* fachada para mandar imagenes al server */
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{   
      /* control de acceso no permitido a usuarios */
      public function __construct()
      {
        $this->middleware('can:admin.home');
        /* deberia andar con estos, pero solo me anda con admin.home, y como una solo funciona 
        para todos, lo dejo asi */ 
        /*  $this->middleware('can:admin.posts.index')->only('index');
          $this->middleware('can:admin.posts.create')->only('create', 'store');
          $this->middleware('can:admin.posts.edit')->only('edit', 'update');
          $this->middleware('can:admin.posts.destroy')->only('destroy');
           */
      }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        /* el metodo pluck genera un array solo con los valores del campo name y su id para poder 
        pasarlo a laravel colective */
        $categories = Category::pluck('name','id');

        $tags = Tag::all();

        return view('admin.posts.create', compact('categories','tags'));
    }


    public function store(PostRequest $request)
    {
         
        /* con este se crea el nuevo post */
        $post = Post::create($request->all());
        /* si al crear un post este tiene imagen */
        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
            /* accedo a la relacion image */
            $post->image()->create([
                'url' => $url
            ]);
        }
        /* añade las etiquetas */
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        /* redirige al editor */
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        /* llamo a la policy que controla los autores de los post */
        $this->authorize('author', $post);
        /* el metodo pluck genera un array solo con los valores del campo name y su id para poder 
        pasarlo a laravel colective */
        $categories = Category::pluck('name','id');

        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        /* llamo a la policy que controla los autores de los post */
        $this->authorize('author', $post);
        /* enviar la actualizacion */
        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
            /* si hay una imagen ya cargada la elimina y la actualiza con la url creada*/
            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
            }            
        }
        /* sincroniza la coleccion de etiquetas que tiene con la que le mandamos*/
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('admin.posts.edit',$post)->with('info','el post se actualizo exitosamente');
    }

   
    public function destroy(Post $post)
    {
       /* llamo a la policy que controla los autores de los post */
       $this->authorize('author', $post);
       
        /* elimina un post */
        $post->delete();
        
        return redirect()->route('admin.posts.index',$post)->with('info','el post se elimino exitosamente');
    }
}
