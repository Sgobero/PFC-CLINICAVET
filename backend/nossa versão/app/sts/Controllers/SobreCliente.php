<?php

namespace Sts\Controllers;

include_once 'app/sts/Controllers/helpers/protect.php';

class SobreCliente{
    
private array|null $data;
private array|null $dataForm;

    /**
     * Método chamado pela UrlController
     * Pega as informações dos formulários por meio de três if diferentes
     *       if('AlterUser') elseif('AlterAdress') elseif('AlterPet')
     *       cada if corresponde a um formulário diferente
     * Logo após chama o método view()
     */
    public function index()
    {
        //informações vinda dos formulares da view sobreCliente.php
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        //OBJ model que vai ser usado em variados métodos
        $stsSobreCliente = new \Sts\Models\StsSobreCliente();


        // if para alterar os dados do usuario
        if(!empty($this->dataForm['AlterUser']))
        {
            unset($this->dataForm['AlterUser']);
            
            $result = $stsSobreCliente->alterUser($this->dataForm);

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

            $result = $stsSobreCliente->alterAdress($this->dataForm);
            //$result = $stsSobreCliente->getResult();

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
            unset($this->dataForm['AlterPet']);
            var_dump($this->dataForm);

            $result = $stsSobreCliente->alterPet($this->dataForm);
            if(!empty($result))
            {
                $_SESSION['msg'] = "Dados do pet alterados com sucesso";
            }else{
                $_SESSION['msg'] = "Falha ao alterar dados do pet, tente novamente mais tarde";
            }
        }


        // if para deletar os dados do usuario
        if(!empty($this->dataForm['DeleteU']))
        {
            unset($this->dataForm['DeleteU']);
            var_dump($this->dataForm);
            extract($this->dataForm);

           $resultD =  $stsSobreCliente-> deleteAll("pet","idpet",$idpet);
        }

        $this->getData();
        $this->view();
    }



    /**
     * Método chamado pelo método index da classe
     * Busca os dados no BD 
     */
    private function getData()
    {
        $stsSobreCliente = new \Sts\Models\StsSobreCliente();
        $this->data = $stsSobreCliente->getData();
    }



    /**
     * Método chamado pelo método index da classe
     * Carrega a view
     */
    private function view(): void
    {
        $loadView = new \Core\LoadView("sts/Views/sobreCliente", $this->data, null);
        $loadView->loadView();
    }
    
}
