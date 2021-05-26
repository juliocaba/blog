<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/* estas policias se declaran para controlar accesos no permitidos, para crearla uso: 
php artisan make:policy PostPolicy donde Post es el nombre del modelo para el que es creada */
class PostPolicy
{
    use HandlesAuthorization;
    /* agrego una regla de autorizacion para verificar si un usuario es el autor de un post para editarlo, borrarlo o actualizarlo*/
    public function author(User $user, Post $post){
        if ($user->id == $post->user_id) {
            return true;    
        }else{
            return false;
        }
        
    }

    public function published(?User $user, Post $post){
        if ($post->status == 2) {
            return true;
        }else{
            return false;
        }
    }
    
}
