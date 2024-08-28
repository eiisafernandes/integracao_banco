<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//post-> serve pra enviar/gravar/ cadastrar algo novo no banco
//get envia os dados no cabeçalho, o post envia de forma oculta
//vamos criar a função "store" lá no UsuarioController
Route::post('/usuario', [UsuarioController::class, 'store']);


//get -> tudo que fizermos de busca/pesquisa tem que ser get
//vamos fazer uma rota pra fazer busca por id
Route::get('/usuario/{id}/find', [UsuarioController::class, 'findById']);

//rota que vai buscar todos os usuarios
Route::get('/usuario', [UsuarioController::class, 'index']);

Route::get('/usuario/search', [UsuarioController::class, 'searchByName']);

//rota para encontrar um email
Route::get('/usuario/search/email', [UsuarioController::class, 'searchByEmail']);

//vamos criar uma rota para excluir um usuario
Route::delete('/usuario/{id}/delete', [UsuarioController::class, 'delete']);

//atualização do usuario
Route::put('/usuario', [UsuarioController::class, 'update']);

