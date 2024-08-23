<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    //vamos criar agora as caracteriasticas do usuario, não precisa apagar o resto da programação
    
    //abaixo estamos criando um atributo protegido (protected $fillable), que vai proteger a classe model de 
    //ataque em massa. faz proteção pra não ter inserção de dados em massa.
    //quando trabalharmos com login, tem que declarar pro laravel que estamos utilizando uma 'password', 
    //que seria senha.

    protected $fillable = [
        'nome', 
        'email',
        'password'

    ];
}
