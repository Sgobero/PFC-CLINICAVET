<?php

abstract class Usuario{

    public $id;
    public $tipo;
    public $email;
    public $senha;
    public $nome;
    public $cpf;
    public $rg;
    public $telefone;

    public function __construct( $email, $senha, $nome, $cpf, $rg, $telefone){ // 6 parâmetros
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->telefone = $telefone;
    }

}