<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControladorAlerta;
use App\Http\Controllers\ControladorHistorial;
use App\Http\Controllers\ControladorInvernadero;
use App\Http\Controllers\ControladorSensor;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\ControladorInicio;
use App\Http\Controllers\ControladorLogin;


// Ruta principal
Route::get('/', [ControladorLogin::class, 'showLoginForm'])->name('login');

Route::get('inicio', [ControladorInicio::class, 'index'])->name('inicio') -> middleware('auth');

// Rutas para alertas
Route::get('alertas', [ControladorAlerta::class, 'index'])->name('alertas.index')->middleware('auth');
Route::get('alertas/create', [ControladorAlerta::class, 'create'])->name('alertas.create')->middleware('auth');
Route::post('alertas', [ControladorAlerta::class, 'store'])->name('alertas.store');
Route::get('alertas/{alerta}', [ControladorAlerta::class, 'show'])->name('alertas.show');
Route::get('alertas/{alerta}/edit', [ControladorAlerta::class, 'edit'])->name('alertas.edit')->middleware('auth');
Route::put('alertas/{alerta}', [ControladorAlerta::class, 'update'])->name('alertas.update');
Route::delete('alertas/{alerta}', [ControladorAlerta::class, 'destroy'])->name('alertas.destroy');

// Rutas para historial
Route::get('historialControl', [ControladorHistorial::class, 'index'])
     ->name('historialControl.index')->middleware('auth');


// Rutas para invernaderos
Route::get('invernaderos', [ControladorInvernadero::class, 'index'])->name('invernaderos.index')->middleware('auth');
Route::get('invernaderos/create', [ControladorInvernadero::class, 'create'])->name('invernaderos.create')->middleware('auth');
Route::post('invernaderos', [ControladorInvernadero::class, 'store'])->name('invernaderos.store');
//Route::get('invernaderos/{invernadero}', [ControladorInvernadero::class, 'show'])->name('invernaderos.show');
Route::get('invernaderos/{invernadero}/edit', [ControladorInvernadero::class, 'edit'])->name('invernaderos.edit')->middleware('auth');
Route::put('invernaderos/{invernadero}', [ControladorInvernadero::class, 'update'])->name('invernaderos.update');
Route::delete('invernaderos/{invernadero}', [ControladorInvernadero::class, 'destroy'])->name('invernaderos.destroy');


// Rutas para usuarios
Route::get('usuarios', [ControladorUsuario::class, 'index'])->name('usuarios.index')->middleware('auth');
Route::get('usuarios/create', [ControladorUsuario::class, 'create'])->name('usuarios.create')->middleware('auth');
Route::post('usuarios', [ControladorUsuario::class, 'store'])->name('usuarios.store');
//Route::get('usuarios/{usuario}', [ControladorUsuario::class, 'show'])->name('usuarios.show');
Route::get('usuarios/{usuario}/edit', [ControladorUsuario::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('usuarios/{usuario}', [ControladorUsuario::class, 'update'])->name('usuarios.update');
Route::delete('usuarios/{usuario}', [ControladorUsuario::class, 'destroy'])->name('usuarios.destroy');

//Ruta para inicio de sesión
Route::get('login' , [ControladorLogin::class, 'showLoginForm'])->name('login');
Route::post('login' , [ControladorLogin::class, 'login'])->name('login');
Route::post('logout' , [ControladorLogin::class, 'logout'])->name('logout');


