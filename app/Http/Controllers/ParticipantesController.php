<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Actividad;
use App\Models\Demandada;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipantesController extends Controller
{

    public function obtenerParticipantes($id)
    {

        $demandada = Demandada::with('actividad')->find($id); // Cargar la relación 'actividad'
        $participantes = Participante::where('id_actdemandada', $id)->get();
        $usuarios = [];

        foreach ($participantes as $participante) {
            $usuario = User::find($participante->id_users);
            if ($usuario) {
                $usuarios[] = $usuario->name;
            }
        }

       // ('actividad', $demandada->actividad) // Acceder al nombre de la actividad a través de la relación
       // ('participantes', $usuarios);

       // $actividad = Actividad::find($id);
        //$participantes = $actividad->participantes()->pluck('nombre')->toArray(); // Ajusta esto según la relación en tu modelo

        return response()->json(['actividad' => $demandada->actividad,
                                'participantes' => $usuarios
     ]);
    }
}
