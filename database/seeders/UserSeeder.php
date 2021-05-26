<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'julio Caba',
            'email' => 'admin@admin.com',
            'password' => bcrypt('algomasomenos')
            /* asigna el rol de admin al crear mi usuario */
        ])->assignRole('admin');
        
        /* crea los datos de relleno de la base de datos */
        User::factory(9)->create();
    }
}
