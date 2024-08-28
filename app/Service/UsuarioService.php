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
    
    //pesquisar por id
    //o find é como se fosse o "select * from..." 
    public function findById($id){
        $usuario = Usuario::find($id);

        if($usuario == null){
            return [
                'status'=> false, 
                'message' => 'Usuario não encontrado'
            ];
        }

        return [
            'status' => true,
            'message' => 'Usuario encontrado',
            //data é referente a dados 
            'data' => $usuario
        ];
    }

    //buscar todos
    //função all (busca todos os usuarios da tabela)
    public function getAll(){
        $usuarios = Usuario::all();

        return [
            'status' => true,
            'message' => 'Pesquisa efetuada com sucesso',
            'data' => $usuarios
        ];
    }
    
    //pesquisar por nome
    //essa função get vai nos trazer todos os nomes da lista
    public function searchByName($nome){
        $usuarios = Usuario::where('nome', 'like', '%' . $nome . '%')->get();

        if($usuarios->isEmpty()){
            return[
                'status' => false,
                'message' => 'Sem resultados'
            ];
        }

        return [
            'status' => true,
            'message' => 'Resultados encontrados',
            'data' => $usuarios
        ];
    }

    public function searchByEmail($email){
        $usuarios = Usuario::where('email', 'like', '%' . $email . '%')->get();
        
        if ($usuarios->isEmpty()){
            return [
                'status' => false,
                'message' => 'Sem resultados',                
            ];
        }

        return [
            'status' => true,
            'message' => 'Resultados encontrados',
            'data' => $usuarios
        ];
    }

    
    //deletar
    //vamos pesquisar o usuario para depois deletar, pesquisar por id
    public function delete ($id){
        $usuario = Usuario::find($id);
        
        if ($usuario == null){
            return [
                'status' => false,
                'message' => 'Usuario nao encontrado'
            ];
        }
        
        $usuario->delete();

        return [
            'status' => true,
            'message' => 'Usuario excluido com sucesso'
        ];
    }
    
    //atualizar
    public function update (array $dados){
        $usuario = Usuario::find($dados['id']);
        
        if($usuario == null){
            return[
                'status' => false,
                'message' => 'Usuario nao encontrado'
            ];
        }
        
        //isset é para verificar se uma chave existe dentro do array. exemplo: se a password existe ou não
        //a programação desta forma, acontece atualização mesmo se não houver um dos tres dados
        //ex: mesmo se nao tiver a senha, os outros dois campos serão atualizados
        if(isset($dados['password'])){
            $usuario->password = $dados['password'];
        }

        if(isset($dados['nome'])){
            $usuario->nome = $dados['nome'];
        }

        if(isset($dados['email'])){
            $usuario->email = $dados['email'];
        }
        
        //vamos acessar um atributo (nome)
        //$usuario->nome = $dados['nome'];
        //$usuario->email = $dados['email'];
        //$usuario->password = $dados['password'];

        $usuario->save();

        return[
            'status' => true,
            'message' => 'Atualização com sucesso'
        ];
        
    }
    
}