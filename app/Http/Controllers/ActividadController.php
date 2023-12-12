<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Actividad;
use App\Models\Municipio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActividadController extends Controller
{
    public function act()
    {
        $a= Actividad::find(1);
        dd($a->nombre);
    }

    public function obtenerMunicipios($id_provincia)
    {
        $municipios = Municipio::where('id_provincia', $id_provincia)->get();

        return response()->json($municipios);
    }

    public function obtenerLugares($id_municipio)
    {
        $lugares = Lugar::where('id_municipio', $id_municipio)->get();

        return response()->json($lugares);
    }

   /* public function nueva(Request $request)
    {
       Actividad::create([
        'nombre' => $request->post('nombre'),
        'tipo' =>$request->post('tipo'),
       ]);
       return redirect('/index')->with('success', 'Actividad creada correctamente');

    }
    */

    public function nueva(Request $request)
    {
        $actividades = Actividad::all();
        return view('nueva')->with('actividades', $actividades);
    }
}
