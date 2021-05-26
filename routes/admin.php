<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

/* para el home del administrador, la protegemos de accesos no deseados usando midelware can, pasandole el permiso*/
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
/* para el CRUD de los blogeros */
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
/* para el CRUD de los roles */
Route::resource('roles',RoleController::class)->names('admin.roles');
/* para el CRUD de categorias */
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
/* para el CRUD de etiquetas */
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
/* para el CRUD de post */
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

