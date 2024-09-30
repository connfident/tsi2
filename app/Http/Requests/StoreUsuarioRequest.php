<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nom_usuario' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
            'rol' => 'required|string|max:50',
        ];
    }
    
    public function messages()
    {
        return [
            'password.confirmed' => 'La confirmación de la contraseña no coincide. Por favor, verifíquela.',
            'email.unique' => 'Ya existe un usuario registrado con ese email.',
            // Agrega más personalizaciones aquí si lo necesitas
        ];
    }


    public function authorize()
    {
        return true; // Cambia esto si necesitas autorización específica
    }
}
