<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Provincia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function prueba()
    {
        $m= Municipio::find(1);
        dd($m->provincia->nombre);

        $p= Provincia::find(29);
        dd($p->municipios);
    }
}
