<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CaminhaoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[HomeController::class,'MostrarHome'])->name('home');
Route::get('/editar-caminhao',[CaminhaoController::class,'MostrarEditarCaminhao'])->name('editar-caminhao');
Route::get('/cadastrar-caminhao',[CaminhaoController::class,'FormularioCadastro'])->name('cadastrar-caminhao');
Route::post('/cadastrar-caminhao',[CaminhaoController::class,'SalvarBanco'])->name('salvar-banco');
//deletar

Route::delete('/editar-caminhao/{registrosCaminhoes}',[CaminhaoController::class,'ApagarBancoCaminhao'])->name('apagar-caminhao');
//alterar caminhao
Route::get('/alterar-caminhao/{registrosCaminhoes}',[CaminhaoController::class,'MostrarAlterarCaminhao'])->name('alterar-caminhao');
Route::put('/editar-caminhao/{registrosCaminhoes}',[CaminhaoController::class,'alterrarBancoCaminhao'])->name('alterar-banco-caminhao');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/editar-carro',[CarroController::class,'MostrarEditarCarro'])->name('editar-carro');
Route::get('/cadastrar-carro',[CarroController::class,'FormularioCadastro'])->name('cadastrar-carro');
Route::post('/cadastrar-carro',[CarroController::class,'SalvarBancoCarro'])->name('salvar-banco-carro');

//deletar
Route::delete('/editar-carro/{registrosCarros}',[CarroController::class,'ApagarBancoCarro'])->name('apagar-carro');

//alterar caminhao
Route::get('/alterar-carro/{registrosCarros}',[CarroController::class,'MostrarAlterarCarro'])->name('alterar-carro');
Route::put('/editar-carro/{registrosCarros}',[CarroController::class,'alterrarBancoCarro'])->name('alterar-banco-carro');
