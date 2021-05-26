<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
/* para paginar con livewire */
use Livewire\WithPagination;
/* para crear este componente de livewire uso: 
php artisan make:livewire Admin\UsersIndex
*/

class UsersIndex extends Component
{
    /* para que use la laginacion de livewire */
    use WithPagination;
    /* para el input de busqueda */
    public $search;
    /* para usar los estilos de bootstrap */    
    protected $paginationTheme = "bootstrap";

    /* este metodo ayuda a mejorar la busqueda, buscando en todas las paginas disponibles */
    public function updatingSearch(){
        $this->resetPage();
    }    
    /* en este metodo recupero la lista de usuarios que quiero que se muestren en el users-index*/
    public function render()
    {
        
        /* la busqueda se filtra aca con el where y el OrWhere donde puedo agregar otro filtro*/
        $users = User::where('name', 'LIKE', '%'. $this->search. '%')->OrWhere('email', 'LIKE', '%'. $this->search. '%')->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }
}
