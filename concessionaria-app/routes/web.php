<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\UserController;
use App\Models\Manufacture;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index']);
Route::get('/produtos', [CarController::class, 'produtos']);
Route::get('/anuncie', [AdminController::class, 'anuncie'])->middleware('auth');

Route::get('/produtos/{id}', [CarController::class, 'show']);
Route::get('/search', [CarController::class, 'search']);
Route::get('/dashboard/administracao', [AdminController::class, 'administracao'])->middleware('role:admin');


Route::get('/dashboard/administracao/veiculos', [AdminController::class, 'getVeiculos'])->middleware('role:admin');
Route::get('/dashboard/administracao/fabricantes', [ManufactureController::class, 'getFabricantes'])->middleware('role:admin');
Route::get('/dashboard/administracao/usuarios', [UserController::class, 'getUsuarios'])->middleware('role:admin');

//post route
Route::get('/dashboard/administracao/veiculos/novo', [CarController::class, 'formulario'])->middleware('role:admin');
Route::get('/dashboard/administracao/veiculos/editar/{id}', [CarController::class, 'formularioEditar'])->middleware('role:admin');
Route::post('/dashboard/administracao/veiculos/novo/store', [CarController::class, 'store' ])->middleware('role:admin');
Route::put('/dashboard/administracao/veiculos/editar/update/{id}', [CarController::class, 'update' ])->middleware('role:admin');
Route::delete('/dashboard/administracao/veiculos/deletar/{id}', [CarController::class, 'destroy'])->middleware('role:admin');

Route::get('/dashboard/administracao/fabricantes/novo', [ManufactureController::class, 'formulario'])->middleware('role:admin');
Route::get('/dashboard/administracao/fabricantes/editar/{id}', [ManufactureController::class, 'formularioEdit'])->middleware('role:admin');
Route::post('/dashboard/administracao/fabricantes/novo/store', [ManufactureController::class, 'store'])->middleware('role:admin');
Route::put('/dashboard/administracao/fabricantes/editar/update/{id}', [ManufactureController::class, 'update'])->middleware('role:admin');
Route::delete('/dashboard/administracao/fabricantes/deletar/{id}', [ManufactureController::class, 'destroy'])->middleware('role:admin');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
