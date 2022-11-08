<?php

namespace Sts\Controllers;

include_once 'app/sts/Controllers/helpers/protect.php';

class Servicos{
    
    private array|string|null $data;

    public function index()
    {    
        $servico = new \Sts\Models\StsServicos();
        $this->data = $servico->index();
        //var_dump($this->data);
        $loadView = new \Core\LoadView("sts/Views/servicos", $this->data, null);
        $loadView->loadView();
    }
    
}