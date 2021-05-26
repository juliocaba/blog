<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/* para crearlo con su carpeta uso: php artisan make:controller Admin\HomeController */

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
