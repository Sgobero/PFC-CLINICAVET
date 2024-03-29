<?php

namespace Core;

class LoadView
{
    /**     function __construct()
     * @param string $nameView endereco da view
     * @param array|string|null $data dados para a view
     * @param array|string|null $more informações extras
     */
    public function __construct(private string $nameView, private array|string|null $data, private array|string|null $more)
    {
    }
    

    /**     function loadView()
     * Carrega a view requerida pela controller
     */
    public function loadViewAdm(): void
    {
        if (file_exists('app/' . $this->nameView . '.php')){
    
            include 'app/' . $this->nameView . '.php';

        } else {
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador " . EMAILADM);
        }
    }
}

?>