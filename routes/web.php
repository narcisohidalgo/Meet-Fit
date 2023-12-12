<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\DemandadaController;
use App\Http\Controllers\PerfilUsuarioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/nueva', function () {
    return view('nueva');
});

Route::get('/crear', function () {
    return view('crear');
});

Route::get('/misactividades', function () {
    return view('misactividades');
});

Route::get('/todasactividades', function () {
    return view('todasactividades');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/actividades_usuario', function () {
    return view('actividades_usuario');
});

Route::get('/eliminar/id={id}', [DemandadaController::class, 'eliminarActividad'])->name('eliminar');

Route::get('/unirse/id={id}', [DemandadaController::class, 'unirseActividad'])->name('unirse');

Route::get('/sucio', [DemandadaController::class, 'sucio']);

Route::get('/crear', [DemandadaController::class, 'crear']);

Route::get('/prueba', [HomeController::class, 'prueba']);

Route::get('/act', [ActividadController::class, 'act']);

Route::get('/nueva', [ActividadController::class, 'nueva']);

Route::get('/reservar', [DemandadaController::class, 'store']);

Route::get('/misactividades', [DemandadaController::class, 'misactividades']);

Route::get('/todasactividades', [DemandadaController::class, 'todasactividades']);

Route::get('/obtener-municipios/{id_provincia}', [ActividadController::class, 'obtenerMunicipios']);

Route::get('/obtener-lugares/{id_municipio}', [ActividadController::class, 'obtenerLugares']);


Route::get('/nombreParticipantes/id={id}', [DemandadaController::class, 'nombreParticipantes']);

Route::get('/obtener-participantes/{id}', [DemandadaController::class, 'obtenerParticipantes']);

Route::get('/perfil', [PerfilUsuarioController::class, 'mostrarPerfil'])->name('perfil')->middleware('auth');

Route::post('/perfil/modificar', [PerfilUsuarioController::class, 'modificarPerfil'])->name('perfil.modificar')->middleware('auth');

//Route::get('/misparticipaciones/{id}', [DemandadaController::class, 'actividadesUsuario']);

Route::get('/actividades_usuario', [DemandadaController::class, 'mostrarActividadesUsuario'])->name('usuario.actividades');


Route::post('/filtro', [DemandadaController::class, 'filtro'])->name('filtro');



//Route::get('/nueva', [DemandadaController::class, 'nueva']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
