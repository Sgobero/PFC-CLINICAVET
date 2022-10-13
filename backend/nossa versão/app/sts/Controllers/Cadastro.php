<?php

namespace Sts\Controllers;

class Cadastro{

    private array|string|null $date = [];
    private array|string|null $dataForm;

    public function index(){
            
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['AddContMsg'])){

            unset($this->dataForm['AddContMsg']);

            echo "<pre>"; var_dump($this->dataForm); echo "</pre>";

            $StsCadastro = new \Sts\Models\StsCadastro();
            
        }


        $stsCadastro = new \Sts\Models\StsCadastro();


        $loadView = new \Core\LoadView("sts/Views/cadastro", $this->date);
        
        $loadView->loadView();

    }

}


?>