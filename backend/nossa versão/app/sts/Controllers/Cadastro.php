<?php

namespace Sts\Controllers;

class Cadastro{

    private array|string|null $data = [];
    private array|string|null $dataForm;
    private object $stsCadastro;



    /**     function index()
     * Método chamado pela UrlController
     * Primeiramente carrega a views cadastro por meio do OBJ de LoadView
     * Recebe os daddos mandados pelo cliente pelo médodo post e depois
     *      chama o mérodo da classe checkIfAccountExist
     */
    public function index(): void
    {      
        if(!isset($_SESSION)){
            session_start();
        } 

        if(isset($_SESSION['idusuario'])){
            $header = URL . "Erro?case=2"; // Erro 002
            header("Location: {$header}");
        }
        else
        {
            //pega os dados do método post
            $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if(!empty($this->dataForm['AddContMsg']))
            {
                unset($this->dataForm['AddContMsg']);
                $this->data = array_chunk($this->dataForm, 7, true);

                $this->checkIfAccountExist();
            }
            else
            {   
                $this->data=[];
                $loadView = new \Core\LoadView("sts/Views/cadastro", $this->data, null);
                $loadView->loadView();
            }
        }        
    }



    /**     function checkIfAccountExist()
     * Verifica se a conta com dados do CPF, RG ou Email fornecidos pelo
     *      cliente já existem no banco de dados
     * Faz isso por meio do OBJ de StsCadastro
     */
    private function checkIfAccountExist(): void
    {
        $this->stsCadastro = new \Sts\Models\StsCadastro();
        $resultVerify = $this->stsCadastro->verifyAccount($this->data[0]);
        
        // caso não tenha registro no BD com os dados da $this->data[0]
        if($resultVerify == true) 
        {
            $this->createNewAccount();
        }else
        {
            $_SESSION['msg'] = "<p style='color:red;'>Dados fornecidos já possuem cadastro no sistema. Tente com outros dados</p>";
            unset($this->data);
            $this->data = $this->dataForm;

            $loadView = new \Core\LoadView("sts/Views/cadastro", $this->data, null);
            $loadView->loadView();
        }
    }



    /**     function createNewAccount()
     * Cria um novo usuário inserindo os dados passados pelo cliente no BD
     * Faz isso por meio de um OBJ de stsCadastro
     */
    private function createNewAccount()
    {   
        $this->data[0]['senha_usuario'] = password_hash($this->data[0]['senha_usuario'], PASSWORD_DEFAULT);

        $idUsuario = $this->stsCadastro->createAccount($this->data);
        
        if(!empty($idUsuario))
        {
            $_SESSION['msg'] = "<p style='color:green;'>Usuario cadastrado com sucesso</p>";

            $header = URL . "Login";
            header("Location: {$header}");
        }else
        {   
            $header = URL . "Erro?case=2"; // Erro 002
            header("Location: {$header}");
        }    
    }
}

?>