<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
/* importo los modelos de roles de spatie*/
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/* se crea para la asignacion de roles, para crearlo uso:  
php artisan make:seeder RoleSeeder
*/

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* defino los roles en dos variables distintas */
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'blogger']);

        /* creo los permisos que necesito */
        Permission::create(['name'=> 'admin.home', 'description' =>'Completa'])->syncRoles([$role1, $role2]);
        /* permisos para los roles de administrador de usuarios */
        Permission::create(['name'=> 'admin.users.index', 'description' =>'ver lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.users.edit', 'description' =>'asignar un rol'])->syncRoles([$role1]);
        /* Permission::create(['name'=> 'admin.users.update', 'description' =>'Completa'])->syncRoles([$role1]); */
        /* permisos para categorias */
        Permission::create(['name'=> 'admin.categories.index', 'description' =>'ver lista de categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.categories.create', 'description' =>'crear categorias'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.categories.edit', 'description' =>'editar categorias'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.categories.destroy', 'description' =>'eliminar categorias'])->syncRoles([$role1]);
        /* permisos para etiquetas */
        Permission::create(['name'=> 'admin.tags.index', 'description' =>'ver lista de etiquetas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.tags.create', 'description' =>'crear etiqueta'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.tags.destroy', 'description' =>'eliminar etiqueta'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.tags.edit', 'description' =>'editar etiqueta'])->syncRoles([$role1]);
        /* permisos para post */
        Permission::create(['name'=> 'admin.post.index', 'description' =>'ver lista de posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.post.create', 'description' =>'crear post'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.post.destroy', 'description' =>'eliminar post'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=> 'admin.post.edit', 'description' =>'editar post'])->syncRoles([$role1, $role2]);

    }
}
