<?php

namespace App\Service;

use App\Models\Usuario;

//dentro das chaves criamos a função, essa função pertence a UsuarioService, 
//estamos criando uma função embaixo da outra
//cada função faz algo diferente, são funções criadas por nós

class UsuarioService 
{
    //cadastrar algo novo
    public function create(array $dados){
        $user = Usuario::create([
            'nome' => $dados['nome'], 
            'email' => $dados ['email'], 
            'password' => $dados ['password']
        ]);

        return $user; 
    }
    
    //atualizar
    public function update (){

    }
    
    //deletar
    public function delete (){
        
    }

    //pesquisar por id
    public function findById(){

    }

    //buscar todos
    public function getAll(){

    }
    
    //pesquisar por nome
    public function searchByName(){

    }

}