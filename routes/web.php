<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAlerta;
use App\Http\Controllers\ControladorHistorial;
use App\Http\Controllers\ControladorInvernadero;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\ControladorInicio;
use App\Http\Controllers\ControladorLogin;
//use App\Http\Controllers\InvernaderoAPIController;

//  RUTA PRINCIPAL
Route::get('/', [ControladorLogin::class, 'showLoginForm'])->name('login');

//  RUTA DE INICIO 
Route::get('inicio', [ControladorInicio::class, 'index'])->name('inicio')->middleware('auth');

//  RUTAS PARA ALERTAS 
Route::middleware(['auth', 'role:Administrador,Estandar'])->group(function () {
    Route::get('alertas', [ControladorAlerta::class, 'index'])->name('alertas.index');
    Route::get('alertas/create', [ControladorAlerta::class, 'create'])->name('alertas.create')->middleware('role:Administrador');
    Route::post('alertas', [ControladorAlerta::class, 'store'])->name('alertas.store')->middleware('role:Administrador');
    Route::get('historialControl', [ControladorHistorial::class, 'index'])->name('historialControl.index');
    Route::delete('historial/{id}', [ControladorHistorial::class, 'destroy'])->name('historial.destroy');

    // Rutas para notificaciones de alertas 
    Route::middleware('role:Administrador')->group(function () {
        Route::get('notificaciones', [ControladorAlerta::class, 'showNotifications'])->name('notificaciones.index');
        Route::get('notificaciones/create', [ControladorAlerta::class, 'createNotification'])->name('notificaciones.create');
        Route::post('notificaciones', [ControladorAlerta::class, 'storeNotification'])->name('notificaciones.store');
    });
/*
    // Detalles y edición de alertas
    Route::middleware('role:Administrador')->group(function () {
        Route::get('alertas/{alerta}', [ControladorAlerta::class, 'show'])->name('alertas.show');
        Route::get('alertas/{alerta}/edit', [ControladorAlerta::class, 'edit'])->name('alertas.edit');
        Route::put('alertas/{alerta}', [ControladorAlerta::class, 'update'])->name('alertas.update');
        Route::delete('alertas/{alerta}', [ControladorAlerta::class, 'destroy'])->name('alertas.destroy');
    });*/
});

/*  RUTAS PARA HISTORIAL DE CONTROL 
Route::middleware(['auth', 'role:Estandar'])->group(function () {
    Route::get('historialControl', [ControladorHistorial::class, 'index'])->name('historialControl.index');
    Route::delete('historial/{id}', [ControladorHistorial::class, 'destroy'])->name('historial.destroy');
});*/

//  RUTAS PARA INVERNADEROS 
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::get('invernaderos', [ControladorInvernadero::class, 'index'])->name('invernaderos.index');
    Route::get('invernaderos/create', [ControladorInvernadero::class, 'create'])->name('invernaderos.create');
    Route::post('invernaderos', [ControladorInvernadero::class, 'store'])->name('invernaderos.store');
    Route::get('invernaderos/{invernadero}/edit', [ControladorInvernadero::class, 'edit'])->name('invernaderos.edit');
    Route::put('invernaderos/{invernadero}', [ControladorInvernadero::class, 'update'])->name('invernaderos.update');
    Route::delete('invernaderos/{invernadero}', [ControladorInvernadero::class, 'destroy'])->name('invernaderos.destroy');
});

//  RUTAS PARA USUARIOS 
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::get('usuarios', [ControladorUsuario::class, 'index'])->name('usuarios.index');
    Route::get('usuarios/create', [ControladorUsuario::class, 'create'])->name('usuarios.create');
    Route::post('usuarios', [ControladorUsuario::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/{usuario}/edit', [ControladorUsuario::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios/{usuario}', [ControladorUsuario::class, 'update'])->name('usuarios.update');
    Route::delete('usuarios/{usuario}', [ControladorUsuario::class, 'destroy'])->name('usuarios.destroy');
});

// RUTAS PARA INICIO DE SESIÓN Y CIERRE DE SESIÓN
Route::get('login', [ControladorLogin::class, 'showLoginForm'])->name('login');
Route::post('login', [ControladorLogin::class, 'login'])->name('login');
Route::post('logout', [ControladorLogin::class, 'logout'])->name('logout');

// RUTA PARA API 
Route::middleware(['auth', 'role:Administrador'])->get('/usuariosInvernaderosJSON', [ControladorUsuario::class, 'usuarioConInvernadero']);

//RUTA PARA API ESTANDAR
Route::middleware(['auth', 'role:Estandar'])->get('/InvernaderosEstandar', [ControladorInvernadero::class, 'misInvernaderos']);