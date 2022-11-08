<?php

namespace Core;

class LoadView
{
    public function __construct(private string $nameView, private array|string|null $data, private array|string|null $more)
    {
    }
    
    public function loadView(): void
    {
        if (file_exists('app/' . $this->nameView . '.php')){
    
            include 'app/' . $this->nameView . '.php';

        } else {
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador " . EMAILADM);
        }
    }
}

?>