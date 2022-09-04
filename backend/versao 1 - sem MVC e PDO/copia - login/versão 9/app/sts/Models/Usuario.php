<?php

abstract class Usuario{

    private $id;
    private $tipo;
    private $email;
    private $senha;
    private $nome;
    private $cpf;
    private $rg;
    private $telefone;

    public function getId(): int{
		return $this->id;
	}
	public function setId(int $id){
		$this->id = $id;
	}


    public function getTipo(): int{
		return $this->tipo;
	}
	public function setTipo(int $tipo){
		$this->tipo = $tipo;
	}
    
    
    public function getEmail(): string{
		return $this->email;
	}
	public function setEmail(string $e){
		$this->email = $e;
	}
	

    public function getSenha(): string{
		return $this->senha;
	}
	public function setSenha(string $senha){
		$this->senha = $senha;
	}


	public function getNome(): string{
		return $this->nome;
	}
	public function setNome(string $nome){
		$this->nome = $nome;
	}


    public function getCpf(): int{
        return $this->cpf;
    }
    public function setCpf(int $cpf){
        $this->cpf = $cpf;
    }


    public function getRg(): int{
        return $this->rg;
    }
    public function setRg(int $rg){
        $this->rg = $rg;
    }


	public function getTelefone(): string{
		return $this->telefone;
	}
	public function setTelefone(string $tel){
		$this->telefone = $tel;
	}

	

}