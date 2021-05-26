<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    /* con este metodo laravel muestra el slug en la url */
    public function getRouteKeyName()
    {
        return "slug";
    }
    /* para asignacion masiva */
    protected $fillable = ['name','slug','color'];
    /* relacion muchos a muchos */
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
