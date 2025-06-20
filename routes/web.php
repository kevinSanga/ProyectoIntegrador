<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

/////////////////////////////////////////

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $user = Auth::user();
        switch ($user->role->name) {
            case 'superadmin': return view('dashboards.superadmin');
            case 'notario': return view('dashboards.notario');
            case 'ayudante': return view('dashboards.ayudante');
            default: abort(403);
        }
    })->name('dashboard');

    // SUPERADMIN
    Route::view('/usuarios', 'admin.users')->middleware('role:superadmin');
    Route::view('/roles', 'admin.roles')->middleware('role:superadmin');
    Route::view('/auditoria', 'admin.logs')->middleware('role:superadmin');

    // NOTARIO
    Route::view('/casos', 'notario.casos')->middleware('role:notario');
    Route::view('/citas', 'notario.citas')->middleware('role:notario');
    Route::view('/opiniones', 'notario.opiniones')->middleware('role:notario');

    // AYUDANTE
    Route::view('/tareas', 'ayudante.tareas')->middleware('role:ayudante');
    Route::view('/documentos', 'ayudante.documentos')->middleware('role:ayudante');
});


////////////////////////////////////////
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//dashboard para cada rol

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        switch ($user->role->name) {
            case 'superadmin':
                return view('dashboards.superadmin');
            case 'notario':
                return view('dashboards.notario');
            case 'ayudante':
                return view('dashboards.ayudante');
            default:
                abort(403, 'Rol no autorizado.');
        }
    })->name('dashboard');
});



