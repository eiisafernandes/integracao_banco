<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //COMENTÁRIOS!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
     //abaixo, o "$table->id();" é como se fosse aquele id (que é a chave primaria, auto-incremento)
     //abaixo, o "$table->timestamps();" quando voce cria ou preenche um campo no banco de dados,
     //o timestamp vai salvar a data, hora, minuto e segundo da atualização.

     //1° iremos criar um campo: "$table->string", dentro do parenteses colocamos o nome do campo que estamos criando
     // o 80 significa a quantidade de caracteres. se nao tivesse colocado nada, deixaria como éo padrão (255 caracteres)
     //nullable(false); significa o "not null". se nao colocar nada dentro do parenteses será "true" (ou seja o 
     //campo podera ser nulo), e a outra opção é
     //"false" ->  "nullable(false);"     
     //-> "unique()" não precisa receber nada no parenteses
     //na programação, tudo que nao for conta matematica, é "string"





    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80)->nullable(false);
            $table->string('email', 100)->nullable(false)->unique();
            $table->string('password')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

     
    //essa função serve pra excluir, depois recriar. 
    //dropIfExists   ->   excluir a tabela usuarios se existir
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }};
