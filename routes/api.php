<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//post-> serve pra enviar/gravar algo novo no banco
//get envia os dados no cabeçalho, o post envia de forma oculta
//vamos criar a função "store" lá no UsuarioController
Route::post('/usuario', [UsuarioController::class, 'store']);