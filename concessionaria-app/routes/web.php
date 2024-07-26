<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index']);

Route::get('/testes/{id}', function(int $id){

    $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    return view("testes", 
    [
        'title' => "Página de testes",
        'id' => $id,
        'nome' => 'luiz henrique',
        'arr' => $arr
    ]);
});

Route::get('/produtos', [CarController::class, 'produtos']);
Route::get('/veiculo/novo', [CarController::class, 'formulario']);
Route::get('/produtos/{id}', [CarController::class, 'show']);

//post route
Route::post('/veiculo/novo/criar', [CarController::class, 'store' ]);
