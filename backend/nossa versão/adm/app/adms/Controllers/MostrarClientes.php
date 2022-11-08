<?php

namespace App\Adms\Controllers;

class MostrarClientes
{

    private array $data;

    /**     function index()
     * Método padrão das classes controllers
     */
    public function index(): void
    {        
        $this->MostrarClientes();
    }



    private function MostrarClientes(): void
    {

        $admsMostrarClientes = new \Adms\Models\AdmsMostrarClientes();
        $result = $admsMostrarClientes->mostraClientes();
        if (!empty($result)) // se os usuarios existirem
        {
            $this->data = $result;
            /*extract($this->data);*/
            // echo "<pre>"; var_dump($this->data); echo "</pre>";

            $this->view();


        } else{
            echo "Clientes não encontrados!";
        }
    }

    
    /**
     * Método chamado pelo método index da classe
     * Carrega a view
     */
    private function view(): void
    {
        $loadView = new \Core\LoadView("adms/Views/mostrarClientes", $this->data, null);
        $loadView->loadView();
    }



    }
    ?>