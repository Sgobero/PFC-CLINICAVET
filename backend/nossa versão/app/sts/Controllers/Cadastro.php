<?php

namespace Sts\Controllers;

class Cadastro{

    private array|string|null $date = [];
    private array|string|null $dataForm;

    public function index()
    {    
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['AddContMsg'])){

            unset($this->dataForm['AddContMsg']);

            $stsCadastro = new \Sts\Models\StsCadastro();

            $this->data = array_chunk($this->dataForm, 7, true);

            $resultVerify = $stsCadastro->verifyAccount($this->data[0]);

            if($resultVerify == true){
                $idUsuario = $stsCadastro->createAccount($this->data);
                if(!empty($idUsuario)){
                    echo "Usuario cadastrado com sucesso <br>";
                    echo "Id do Usuario: " . $idUsuario;
                }
            }else{
                echo "Usuario já cadastrado, tente com outros dados";
            }
            
        }

        $stsCadastro = new \Sts\Models\StsCadastro();

        $loadView = new \Core\LoadView("sts/Views/cadastro", $this->date);
        
        $loadView->loadView();
    }
}

?>
