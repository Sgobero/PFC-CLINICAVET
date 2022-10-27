<?php

namespace Sts\Controllers;

include_once 'app/sts/Controllers/helpers/protect.php';

class CadastroPet
{

    private array|null $data = null;
    private array|null $dataForm;
    private string|null $whichForm = null;

    private string|null $tipoAnimal;
    private string|null $result;
    


    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $this->whichForm = "PetType";

        if(isset($this->dataForm['PetType']))
        {
            unset($this->dataForm['PetType']);

            $this->tipoAnimal = $this->dataForm['animal'];
            $this->getDataPet();

            $this->whichForm = "CreatePet";
        }

        elseif(isset($this->dataForm['CreatePet']))
        {
            unset($this->dataForm['CreatePet']);
            
            $this->createNewPet();

            if(!empty($this->result)){
                $_SESSION['msg'] = "Pet Cadastrado com sucesso";
                header("Location: http://localhost/ClinicaBack/Clinica/Home");
            }else{
                $_SESSION['msg'] = "Erro ao cadastrar usuario, entre em contato com o ADM: " . EMAILADM;
            }
        }
        
        $this->view();
    }



    private function getDataPet(): void
    {
        $stsPet = new \Sts\Models\StsCadastroPet();
        $this->data = $stsPet->dataPet($this->tipoAnimal); 
    }



    private function createNewPet()
    {
        $stsPet = new \Sts\Models\StsCadastroPet();
        $this->result = $stsPet->createPet($this->dataForm);
    }   


    
    private function view(): void
    {
        $loadView = new \Core\LoadView('sts/Views/cadastroPet', $this->data, $this->whichForm);
        $loadView->loadView();
    }
}

?>