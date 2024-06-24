<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HistorialController;

use App\Http\Controllers\CitasController;
use App\Models\Historial;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/citas/calendar', [CitasController::class, 'calendar'])->name('citas.calendar');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('pacientes/search', [PacienteController::class, 'search'])->name('pacientes.search');
Route::get('propietarios/search', [PropietarioController::class, 'search'])->name('propietarios.search');
Route::post('citas/search', [CitasController::class, 'search'])->name('citas.search');
Route::get('/citas/horarios-disponibles', [CitasController::class, 'horariosDisponibles'])->name('citas.horarios_disponibles');

Route::post('/historial/searchPropietario', 'HistorialController@searchPropietario')->name('historial.searchPropietario');

Route::get('/historial/search', 'HistorialController@search')->name('historial.search');
Route::get('/historial', 'HistorialController@index')->name('historial.index');

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('especialidad', EspecialidadController::class);
    Route::resource('especie', EspecieController::class);
    Route::resource('raza', RazaController::class);
    Route::resource('medicos', MedicoController::class);
    Route::resource('propietarios', PropietarioController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('citas', CitasController::class);
    Route::resource('historial', HistorialController::class);
    Route::get('historial/pdf', [HistorialController::class, 'pdf'])->name('historial.pdf');

    
});
