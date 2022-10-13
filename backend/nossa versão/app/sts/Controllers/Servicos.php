<?php

namespace Sts\Controllers;

class Servicos{
    
    private array|string|null $data;

    public function index(){
        
        $servico = new \Sts\Models\StsServicos();
        $this->data = $servico->index();

        $loadView = new \Core\LoadView("sts/Views/servicos", $this->data);
        $loadView->loadView();
    }
    
}