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

    public function findById($id){
        $result = $this->usuarioService->findById($id);  //id é um identificador único

        return response()->json($result);
    }

    public function index(){
        $result = $this->usuarioService->getAll();
        
        //response é uma resposta
        return response()->json($result);
    }
    
    //objetivo dessa função: dentro da coluna nome vamos encontrar algo
    public function searchByName(Request $request){
        $result = $this->usuarioService->searchByName($request->nome);

        return response()->json($result);
    }

    public function searchByEmail(Request $request){
        $result = $this->usuarioService->searchByEmail($request->email);

        return response()->json($result);
    }
    
    //essa função espera um id, por isso a $id
    public function delete($id){
        $result = $this->usuarioService->delete($id);
        
        return response()->json($result);
    }

    //tudo que tem de entrada (novo nome, novo usuario) é 
    //duas situações não vão precisar de request: pesquisa por id e delete
    //lembra: quando vc passar o paramentro pela url (a rota la no insomnia) não precisa de request 
    public function update(Request $request){
        $result = $this->usuarioService->update($request->all());

        return response()->json($result);
    }
}
