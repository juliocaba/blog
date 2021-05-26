<?php
/* para crearlo uso: php artisan make:livewire navigation tambien crea el navigation.blade.php */
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class Navigation extends Component
{
    public function render()
    {
        $categories= Category::all();
        return view('livewire.navigation', compact('categories'));
    }
}
