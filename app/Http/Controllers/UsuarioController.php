<?php

namespace App\Http\Controllers;

use App\Service\UsuarioService;
use Illuminate\Http\Request;

//estância  
class UsuarioController extends Controller
{
    protected $usuarioService;

    //"construct" é o metodo construtor da classe - quando você estanciar um novo objeto ele te da a
    //possibilidade de você acessar o service.
    //ele vai construir o que a nossa classe precisa
    //
    // 
    public function __construct(UsuarioService $novoUsuarioService)
    {    //essa variavel $usuarioService vai receber o valor da variavel $novoUsuarioService
        $this->usuarioService = $novoUsuarioService;
    }

    public function store(Request $request){
        //ligação do usuarioService para o usuarioController. 
        //apertar "ctrl" e colocar a seta em cima da função, te leva até a aba da função
        $user = $this->usuarioService->create($request->all());

        return $user; //essa é a resposta. acontece uma ida e uma volta
    }
}
