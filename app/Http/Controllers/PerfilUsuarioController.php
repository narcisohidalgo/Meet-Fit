<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PerfilUsuarioController extends Controller
{
      public function mostrarPerfil()
    {
        $usuario = Auth::user();
        return view('perfil', ['usuario' => $usuario]);
    }



    public function modificarPerfil(Request $request)
    {
        $usuario = Auth::user();
    
        // Validación de campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($usuario) {
                    if (!Hash::check($value, $usuario->password)) {
                        $fail('La contraseña actual es incorrecta.');
                    }
                },
            ],
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);
    
        // Actualizar nombre
        $usuario->name = $request->input('nombre');
    
        // Actualizar contraseña solo si se proporciona una nueva
        if ($request->filled('new_password')) {
            $usuario->password = bcrypt($request->input('new_password'));
        }
    
        $usuario->save();
    
        return redirect()->back()->with('success', 'Perfil actualizado exitosamente.');
    }



        /*
        $usuario = Auth::user();
        $usuario->name = $request->input('nombre');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();

        return redirect()->back()->with('success', 'Perfil actualizado exitosamente.');

        */
    }

