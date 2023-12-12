<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lugar;
use App\Models\Actividad;
use App\Models\Demandada;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Participante;
use Illuminate\Http\Request;
use App\Mail\UnirseActividad;
use App\Models\ActividadLugar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UnirseActividadNotification;

class DemandadaController extends Controller
{
    public function crear(Request $request)
    {
        $actividades = Actividad::all();
        $lugares = Lugar::all();
        $provincias = Provincia::all();
        $municipios = Municipio::all();

        return view('crear')->with('actividades', $actividades)->with('lugares', $lugares)->with('provincias', $provincias)->with('municipios', $municipios);
    }

    public function misactividades(Request $request)
    {

        $misactividades = Demandada::where('id_users', Auth::user()->id)->get();
        return view("misactividades", ['misactividades' => $misactividades]);
    }

    public function filtro(Request $request)
    {

           // FILTRO
           $actividadesDisponibles = Actividad::pluck('nombre', 'nombre');

           $actividades = Actividad::all();

           $query = Demandada::query();

           $provincias = Provincia::all();

           // Aplicar filtros si se han proporcionado en la solicitud
           if ($request->has('dia')) {
            $formattedDate = date('d-m-Y', strtotime($request->input('dia')));
            $query->where('dia', $formattedDate);
        }

        /*
           if ($request->has('actividad_nombre')) {
               $query->whereHas('actividad', function ($q) use ($request) {
                   $q->where('nombre', $request->input('actividad_nombre'));
               });
           }

           */
          if ($request->has('actividad_nombre')) {
            $query->where('id_actividad', $request->input('actividad_nombre'));
        }




           if ($request->has('provincia_nombre')) {
               $query->whereHas('lugar.municipio.provincia', function ($q) use ($request) {
                   $q->where('nombre', $request->input('provincia_nombre'));
               });
           }

           if ($request->has('provincia_nombre')) {
            $query->whereHas('lugar.municipio.provincia', function ($q) use ($request) {
                $q->where('nombre', $request->input('provincia_nombre'));
            });
        }





           $todasactividades = $query->get();



               //TERMINA EL FILTRO
               return view('todasactividades')->with('todasactividades', $todasactividades)->with('actividades', $actividades)->with('provincias', $provincias);


    }

    public function todasactividades(Request $request)
    {
        $todasactividades = Demandada::all();
        $participantes = Participante::all();
        $users = User::all();
        $actividades = Actividad::all();
        $provincias = Provincia::all();


        foreach ($todasactividades as $demandada) {
            $auxiliar = array();
            foreach ($participantes as $participante) {
                if ($participante->id_actdemandada == $demandada->id) {
                    $usuario = User::find($participante->id_users); // Obtener el objeto del usuario
                    if ($usuario) {
                        array_push($auxiliar, $usuario->name); // Agregar el nombre del usuario al array
                    }
                }
            }

            $demandada->participantes = $auxiliar;
        }

        if (Auth::check()) {
            foreach ($todasactividades as $demandada) {
                $unido = False;
                foreach ($participantes as $participante) {
                    if ($participante->id_actdemandada == $demandada->id) {
                        if ($participante->id_users == Auth::user()->id) {
                            $unido = True;
                        }
                    }
                }
                $demandada->unido = $unido;
            }


            return view('todasactividades')->with('todasactividades', $todasactividades)->with('participantes', $participantes)->with('actividades', $actividades)->with('provincias', $provincias);
        } else {

            return view('todasactividades')->with('todasactividades', $todasactividades)->with('participantes', $participantes)->with('actividades', $actividades)->with('provincias', $provincias);
        }
    }

    public function nombreParticipantes($id)
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

        return view('participantes')
            ->with('actividad', $demandada->actividad) // Acceder al nombre de la actividad a través de la relación
            ->with('participantes', $usuarios);
    }
    /*
    public function actividadesUsuario($id)
{

        $demandada = Demandada::with('usuario')->find($id); // Cargar la relación 'actividad'
        $participantes = Participante::where('id_users', $id)->get();
        $usuario = [];

        foreach ($participantes as $participante) {
            $usuario = User::find($participante->id_users);
            if ($usuario) {
                $usuarios[] = $usuario->name;
            }
        }

        return view('misparticipaciones')
            ->with('actividad', $demandada->actividad) // Acceder al nombre de la actividad a través de la relación
            ->with('participantes', $usuarios);
}
*/
    /*
    public function actividadesUsuario($idUsuario)
    {
        $usuario = User::with('actividades')->find($idUsuario);

        $actividades = $usuario->actividades;

        return view('actividades_usuario')
            ->with('usuario', $usuario)
            ->with('actividades', $actividades);
    }

    */

    public function mostrarActividadesUsuario()
    {

        $usuario = Auth::user();
        $participantes = Participante::where('id_users', $usuario->id)->with('demandada.actividad')->get();


        return view('actividades_usuario')
            ->with('usuario', $usuario)
            ->with('actividades', $participantes);
    }





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

        return response()->json([
            'actividad' => $demandada->actividad,
            'participantes' => $usuarios
        ]);
    }

    /*

    public function nombreParticipantes($id)
{
    $actividad = Demandada::find($id); // Buscar la actividad por su ID
    $participantes = Participante::where('id_actdemandada', $id)->get(); // Obtener participantes de esa actividad
    $usuarios = [];

    foreach ($participantes as $participante) {
        $usuario = User::find($participante->id_users); // Obtener el objeto del usuario
        if ($usuario) {
            $usuarios[] = $usuario->name; // Agregar el nombre del usuario al array
        }
    }

    return view('participantes')
        ->with('actividad', $actividad)
        ->with('participantes', $usuarios);
}

*/

    /*
    public function nombreParticipantes($id)
    {
        $todasactividades = Demandada::all();
        $participantes = Participante::all();
        $users = User::all();


        foreach ($todasactividades as $demandada) {
            $auxiliar = array();
            foreach ($participantes as $participante) {
                if ($participante->id_actdemandada == $demandada->id) {
                    $usuario = User::find($participante->id_users); // Obtener el objeto del usuario
                    if ($usuario) {
                        array_push($auxiliar, $usuario->name); // Agregar el nombre del usuario al array
                    }
                }
            }

            $demandada->participantes = $auxiliar;
        }

        return view('participantes')->with('todasactividades', $todasactividades)->with('participantes', $participantes);

        //return $auxiliar;

       // return view('todasactividades')->with('todasactividades', $todasactividades)->with('participantes', $participantes);
    }

    */





    /* public function nombreParticipantes($id)
    {
        $todasactividades = Demandada::all();
        $participantes = Participante::all();
        $users = User::all();


        foreach ($todasactividades as $demandada) {
            $auxiliar = array();
            foreach ($participantes as $participante) {
                if ($participante->id_actdemandada == $demandada->id) {
                    array_push($auxiliar, $participante->id_users);
                }
            }

            $nombreParticipantes = array();
            foreach ($users as $user) {
                foreach ($auxiliar as $participanteUserId) {
                    if ($user->id == $participanteUserId) {
                        array_push($nombreParticipantes, $user->name);
                    }
                }
            }

            $demandada->participantes = implode(',', $nombreParticipantes);
            $demandada->lugar = $demandada->lugar;
            $demandada->actividad = $demandada->actividad;
        }

        return $auxiliar;

        //return $demandada->participantes = implode(',', $nombreParticipantes);

        // return implode(',', $nombreParticipantes);
    }

    */

    public function store(Request $request)
    {
        $Demandada = new Demandada();
        $Demandada->id_users = Auth::user()->id;
        $Demandada->hora = $request->get('hora');
        $Demandada->dia = $request->get('dia');
        $Demandada->id_actividad = $request->get('actividad');
        $Demandada->id_lugar = $request->get('lugar');
        $Demandada->save();

        $misactividades = Demandada::where('id_users', Auth::user()->id)->get();

        return redirect('/misactividades')->with('misactividades', $misactividades)->with('success', 'Actividad creada correctamente');
    }

    public function eliminarActividad($id)
    {

        Demandada::find($id)->delete();

        $misactividades = Demandada::where('id_users', Auth::user()->id)->get();

        return redirect("/misactividades")->with('misactividades', $misactividades)->with('success', 'Actividad eliminada correctamente');
    }

    public function unirseActividad($id)
    {

    $participante = new Participante();
    $participante->id_actdemandada = $id;
    $participante->id_users = Auth::user()->id;
    $participante->save();

    $demandada = Demandada::find($id); // Obtener la actividad
    $actividad = $demandada->actividad->nombre;

    // Enviar el correo electrónico
    Mail::to(Auth::user()->email)->send(new UnirseActividad(Auth::user(), $actividad));

    // Resto de tu lógica de redirección

    $todasactividades = Demandada::all();

    return redirect("/todasactividades")->with('todasactividades', $todasactividades)->with('success', 'Te has unido correctamente');
}

        /*

        $participante = new Participante();
        $participante->id_actdemandada = $id;
        $participante->id_users = Auth::user()->id;
        $participante->save();

        // Obtén la actividad recién creada
    $actividad = Demandada::find($id);

     // Envía la notificación al usuario
     Auth::user()->notify(new UnirseActividadNotification($actividad->id));

        $todasactividades = Demandada::all();

        return redirect("/todasactividades")->with('todasactividades', $todasactividades)->with('success', 'Te has unido correctamente');
    }
    */

}
