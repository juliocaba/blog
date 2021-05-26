<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

/* para crearlo uso: php artisan make:Observer PostObserver --model=Post 
indicandole al modelo para el que lo voy a crear 
*/


/* para registrar el observer:  
- voy a app/providers/eventservicesproviders 
- registro el modelo y el observador
- registrarlo en el metodo boot
*/


class PostObserver
{
    /* por ahora solo voy a usar creating y deleting */

    public function creating(Post $post)
    {
        /* de esta forma si ejecuto los seeders no tira error con esta info */
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;     
        }
        
    }
    public function deleting(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image->url); 
        }
    }

    
}
