<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

/* controlador para el crud de blogeros, para crearlo uso:  
php artisan make:controller Admin\UserController -r
*/

class UserController extends Controller
{
    /* control de acceso no permitido a usuarios */
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        
    }
    public function index()
    {
        return view('admin.users.index');
    }    
    public function edit(User $user)
    {
        /* acceso a todos los roles, antes se debe importar la clase role de spatie */
        $roles = Role::all();
        /* le envio a la vista las variables user y roles */
        return view('admin.users.edit', compact('user','roles'));
    }  
    public function update(Request $request, User $user)
    {
        /* coloca nuevos registros  */
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info','se asignaron los roles correctamente');
    }
    
}
