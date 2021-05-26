<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    
    /* asignacion masiva para el campo url */
    protected $fillable = ['url'];

    /* relacion polimorfica */
    public function imageable(){
        return $this->morphTo();
    }
}
