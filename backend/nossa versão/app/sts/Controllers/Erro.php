<?php

namespace Sts\Controllers;

class Erro{

    //recebe a descrição do erro
    private array $data;
    private string|int $case = 0;

    public function index(){
        
        if(!isset($_SESSION)){
            session_start();
        } 
        if(isset($_GET['case'])){
            $this->case = $_GET['case'];
        }
        
        switch ($this->case) {
            case 0 :
                $this->data['numeroErro'] = "000";
                $this->data['descricaoErro'] = "Página não encontrada";
                $this->data['botao'] = "Home";
                $this->data['descricaoBotao'] = "Ir para a HOME";
                break;
            case 1:
                $this->data['numeroErro'] = "001";
                $this->data['descricaoErro'] = "Erro ao cadastrar novo usuario, entre em contato com o nosso email: " . EMAILADM;
                $this->data['botao'] = "Home";
                $this->data['descricaoBotao'] = "Ir para a HOME";
                break;
            case 2:
                $this->data['numeroErro'] = "002";
                $this->data['descricaoErro'] =  "Você já está logado, para cadastrar ou logar com outra conta é necessario fazer logout";
                $this->data['botao'] = "Home";
                $this->data['descricaoBotao'] = "Ir para a HOME";
                break;
            case 3:
                $this->data['numeroErro'] = "003";
                $this->data['descricaoErro'] =  "Erro ao cadastrar novo pet, entre em contato com o ADM: " . EMAILADM;
                $this->data['botao'] = "Cadastro-Pet";
                $this->data['descricaoBotao'] = "Voltar para tela de Cadastro Pet";
                break;
            case 4:
                $this->data['numeroErro'] = "004";
                $this->data['descricaoErro'] =  "Erro ao alterar dados do usuario, tente novamente ou entre em contato com o ADM: " . EMAILADM;
                $this->data['botao'] = "Sobre-Cliente";
                $this->data['descricaoBotao'] = "Voltar para tela de Sobre Cliente";
                break;
            case 5:
                $this->data['numeroErro'] = "005";
                $this->data['descricaoErro'] =  "Erro ao alterar dados do endereço, tente novamente ou entre em contato com o ADM: " . EMAILADM;
                $this->data['botao'] = "Sobre-Cliente";
                $this->data['descricaoBotao'] = "Voltar para tela de Sobre Cliente";
                break;
            case 6:
                $this->data['numeroErro'] = "006";
                $this->data['descricaoErro'] =  "Erro ao alterar dados do pet, tente novamente ou entre em contato com o ADM: " . EMAILADM;
                $this->data['botao'] = "Sobre-Cliente";
                $this->data['descricaoBotao'] = "Voltar para tela de Sobre Cliente";
                break;
            case 7:
                $this->data['numeroErro'] = "007";
                $this->data['descricaoErro']  = "Não é possível acessar essa página pois você não está logado";
                $this->data['botao'] = "Login";
                $this->data['descricaoBotao'] = "Realizar Login";
        }

        $loadView = new \Core\LoadView("sts/Views/erro", $this->data, null);
        $loadView->loadView();

    }

}