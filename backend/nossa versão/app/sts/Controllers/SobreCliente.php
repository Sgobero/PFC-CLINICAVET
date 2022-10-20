<?php

namespace Sts\Controllers;

include_once 'app/sts/Controllers/helpers/protect.php';

class SobreCliente{
    
private array|null $data;
private array|null $dataForm;
private object $sts;


    /**
     * Método chamado pela UrlController
     * Pega as informações do formulario e chama o método view()
     */
    public function index()
    {
        //informações vinda dos formulares da view sobreCliente.php
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        //OBJ model que vai ser usado em variados métodos
        $this->sts = new \Sts\Models\StsSobreCliente();


        // if para alterar os dados do usuario
        if(!empty($this->dataForm['AlterUser']))
        {
            unset($this->dataForm['AlterUser']);
            
            $this->sts->alterUser($this->dataForm);
            $result = $this->sts->getResult();

            if(!empty($result))
            {
                $_SESSION['msg'] = "Dados do usuario alterados com sucesso";
            }else{
                $_SESSION['msg'] = "Falha ao alterar dados, tente novamente mais tarde";
            }
        }


        // if para alterar o endereço do usuario
        elseif(!empty(($this->dataForm['AlterAdress'])))
        {   
            unset($this->dataForm['AlterAdress']);

            $this->sts->alterAdress($this->dataForm);
            $result = $this->sts->getResult();

            if(!empty($result))
            {
                $_SESSION['msg'] = "Dados de endereço alterados com sucesso";
            }else{
                $_SESSION['msg'] = "Falha ao alterar endereço, tente novamente mais tarde";
            }
        }


        // if para alterar os dados do pet
        elseif(!empty($this->dataForm['AlterPet']))
        {
            // alterar pet, ainda precisa implementar
            unset($this->dataForm['AlterPet']);
        }

        $this->view();
    }


    /**
     * Método chamado pelo metodo index da classe
     * Recupera os dados no BD e carrega a view
     */
    private function view(): void
    {
        $this->sts->index();
        $this->data = $this->sts->getdata();

        $loadView = new \Core\LoadView("sts/Views/sobreCliente", $this->data);
        $loadView->loadView();
    }
    
}
