<?php

namespace Database\Seeders;

use App\Models\Usuario; // Asegúrate de que el modelo Usuario está importado
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Crea un usuario
        Usuario::create([
            'nom_usuario' => 'Admin',
            'email' => 'usuario1@example.com',
            'password' => Hash::make('123123'), // Hasheando la contraseña
            'rol' => 'admin', // Cambia según sea necesario
        ]);

        // Puedes crear más usuarios si lo deseas
        Usuario::create([
            'nom_usuario' => 'Usuario1',
            'email' => 'usuario2@gmail.com',
            'password' => Hash::make('123123'),
            'rol' => 'user',
        ]);

        Usuario::create([
            'nom_usuario' => 'Usuario2',
            'email' => 'usuario3@gmail.com',
            'password' => Hash::make('123123'),
            'rol' => 'user',
        ]);
    }
}
