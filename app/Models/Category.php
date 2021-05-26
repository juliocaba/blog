<?php

namespace App\Models;
/* para crear este modelo con la migracion uso: php artisan make:model Category -m */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];
    /* con este metodo laravel muestra el slug en la url */
    public function getRouteKeyName()
    {
        return "slug";
    }
    /* relacion uno a muchos  con users*/
public function posts(){
    return $this->hasMany(Post::class);
}
}
