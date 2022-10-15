<?php

namespace Sts\Controllers;

include_once 'app/sts/Controllers/helpers/protect.php';

class Servicos{
    
    private array|string|null $data;

    public function index()
    {    
        $servico = new \Sts\Models\StsServicos();
        $this->data = $servico->index();

        $loadView = new \Core\LoadView("sts/Views/servicos", $this->data);
        $loadView->loadView();
    }
    
}
