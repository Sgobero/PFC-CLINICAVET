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
                $this->data['numero'] = "000";
                $this->data['descricao'] = "Página não encontrada";
                break;
            case 1:
                $this->data['numero'] = "001";
                $this->data['descricao'] = "Erro ao cadastrar novo usuario, entre em contato com o nosso email: " . EMAILADM;
                break;
            case 2:
                $this->data['numero'] = "002";
                $this->data['descricao'] =  "Você já está logado, para cadastrar ou logar com outra conta é necessario fazer logout";
                break;
            case 3:
                $this->data['numero'] = "003";
                $this->data['descricao'] =  "Erro ao cadastrar novo pet, entre em contato com o ADM: " . EMAILADM;
                break;
            case 4:
                $this->data['numero'] = "004";
                $this->data['descricao'] =  "Erro ao alterar dados do usuario, tente novamente ou entre em contato com o ADM: " . EMAILADM;
                break;
            case 5:
                $this->data['numero'] = "005";
                $this->data['descricao'] =  "Erro ao alterar dados do endereço, tente novamente ou entre em contato com o ADM: " . EMAILADM;
                break;
            case 6:
                $this->data['numero'] = "006";
                $this->data['descricao'] =  "Erro ao alterar dados do pet, tente novamente ou entre em contato com o ADM: " . EMAILADM;
                break;
            case 7:
                $this->data['numero'] = "007";
                $this->data['descricao']  = "Não é possível acessar essa página pois você não está logado";
        }

        $loadView = new \Core\LoadView("sts/Views/erro", $this->data, null);
        $loadView->loadView();

    }

}