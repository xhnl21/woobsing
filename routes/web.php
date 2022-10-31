<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// 2fa middleware
Route::middleware(['2fa'])->group(function () {
    // HomeController
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');

    Route::get('/permiso', [App\Http\Controllers\Permisos\PermisosController::class, 'index'])->name('permisoL');
    Route::get('/permisoS', [App\Http\Controllers\Permisos\PermisosController::class, 'permisoS'])->name('permisoS');
    Route::post('/permisoC', [App\Http\Controllers\Permisos\PermisosController::class, 'permisoC'])->name('permisoC');
    Route::get('/permisoD/{id}', [App\Http\Controllers\Permisos\PermisosController::class, 'permisoD']);

    Route::get('/configP', [App\Http\Controllers\Permisos\PermisosController::class, 'configP'])->name('configP');
    Route::get('/configPE/{id}', [App\Http\Controllers\Permisos\PermisosController::class, 'configPE'])->name('configPE');
    Route::post('/configPU', [App\Http\Controllers\Permisos\PermisosController::class, 'configPU'])->name('configPU'); 

    Route::get('/rol', [App\Http\Controllers\Rol\RolesController::class, 'index'])->name('rolL');
    Route::get('/rolS', [App\Http\Controllers\Rol\RolesController::class, 'rolS'])->name('rolS');
    Route::post('/rolC', [App\Http\Controllers\Rol\RolesController::class, 'rolC'])->name('rolC');
    Route::get('/rolD/{id}', [App\Http\Controllers\Rol\RolesController::class, 'rolD']);  
    
    Route::get('/configR', [App\Http\Controllers\Rol\RolesController::class, 'configR'])->name('configR');
    Route::get('/configRE/{id}', [App\Http\Controllers\Rol\RolesController::class, 'configRE'])->name('configRE');
    Route::post('/configRU', [App\Http\Controllers\Rol\RolesController::class, 'configRU'])->name('configRU');   
});

Route::get('/complete-registration', [App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('complete.registration');