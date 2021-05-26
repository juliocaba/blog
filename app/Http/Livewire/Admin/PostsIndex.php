<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
/* para poder usar la paginacion con livewire */
use Livewire\WithPagination;

/* para crearlo uso: php artisan make:livewire Admin/PostsIndex */
class PostsIndex extends Component
{
    use WithPagination;
    /* para que muestre la paginacion con estilos de bootstrap */
    protected $paginationTheme ="bootstrap"; 
    /* para sincronizar con la busqueda del index de post */
    public $search;

    /* este metodo ayuda a mejorar la busqueda, buscando en todas las paginas disponibles */
    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        /* con esto a la variable posts le asigno la busqueda de los usuarios autenticados, buscandolos por el id */
        $posts = Post::where('user_id', auth()->user()->id)->where('name','LIKE', '%'. $this->search . '%')->latest('id')->paginate();
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
