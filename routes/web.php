<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TaskController;

/////////////////////////////////////////
// AUTENTICACIÓN
/////////////////////////////////////////

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/////////////////////////////////////////
// DASHBOARD POR ROL
/////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        switch ($user->role->name) {
            case 'superadmin':
                return view('dashboards.superadmin');

            case 'notario':
                $tareas = \App\Models\Task::with('user')
                    ->orderByDesc('created_at')
                    ->limit(10)
                    ->get();
                return view('dashboards.notario', compact('tareas'));

            case 'ayudante':
                return view('dashboards.ayudante');

            default:
                abort(403, 'Rol no autorizado.');
        }
    })->name('dashboard');
});

/////////////////////////////////////////
// RUTAS SUPERADMIN
/////////////////////////////////////////

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::view('/usuarios', 'admin.users');
    Route::view('/roles', 'admin.roles');
    Route::view('/auditoria', 'admin.logs');
});

/////////////////////////////////////////
// RUTAS NOTARIO
/////////////////////////////////////////

Route::middleware(['auth', 'role:notario'])->group(function () {
    // Clientes
    Route::get('/clientes', [ClientController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClientController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClientController::class, 'store'])->name('clientes.store');

    // Citas
    Route::get('/citas', [AppointmentController::class, 'index'])->name('citas.index');
    Route::get('/citas/create', [AppointmentController::class, 'create'])->name('citas.create');
    Route::post('/citas', [AppointmentController::class, 'store'])->name('citas.store');

    // Casos
    Route::get('/casos', [CaseController::class, 'index'])->name('casos.index');
    Route::get('/casos/create', [CaseController::class, 'create'])->name('casos.create');
    Route::post('/casos', [CaseController::class, 'store'])->name('casos.store');

    // Opiniones legales
    Route::view('/opiniones', 'notario.opiniones')->name('opiniones.index');

    // Crear tareas
    Route::get('/tareas/crear', [TaskController::class, 'create'])->name('tareas.create');
    Route::post('/tareas', [TaskController::class, 'store'])->name('tareas.store');
});

/////////////////////////////////////////
// RUTAS AYUDANTE
/////////////////////////////////////////

Route::middleware(['auth', 'role:ayudante'])->group(function () {
    // Ver tareas y actualizar estado
    Route::get('/tareas', [TaskController::class, 'index'])->name('tareas.index');
    Route::post('/tareas/{id}/estado', [TaskController::class, 'updateStatus'])->name('tareas.estado');
});

/////////////////////////////////////////
// RUTAS COMPARTIDAS (NOTARIO Y AYUDANTE)
/////////////////////////////////////////

Route::middleware(['auth', 'role:notario,ayudante'])->group(function () {
    Route::get('/documentos', [DocumentController::class, 'index'])->name('documentos.index');
    Route::get('/documentos/create', [DocumentController::class, 'create'])->name('documentos.create');
    Route::post('/documentos', [DocumentController::class, 'store'])->name('documentos.store');
});
