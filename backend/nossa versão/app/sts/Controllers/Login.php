<?php

namespace Sts\Controllers;

class Login{
    
    private array|string|null $date = [];
    private array|string|null $dataForm;

    public function index(){
        
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['AddContMsg'])){

            unset($this->dataForm['AddContMsg']);
            
            $stsLogin = new \Sts\Models\StsLogin();
            $result = $stsLogin->login($this->dataForm);
            if(!empty($result)){
                extract($result[0]);
                echo "Id do usuario: {$idusuario}";
            }else{
                echo "Usuario não existente";
            }


        }

        $loadView = new \Core\LoadView('sts/Views/login', null);
        $loadView->loadView();
        
    }
    
}
