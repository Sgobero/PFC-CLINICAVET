<?php

namespace Sts\Controllers;

class Login{
    
    private array|string|null $date = [];
    private array|string|null $dataForm;
    private object $stsLogin;


    /**     function index()
     * Método chamado pela UrlController;
     * Primeiro pode receber informações do formulario login, se receber
     *      chama o método da classe createNewUser;
     * Responsável por carregar a tela login por meio de um OBJ LoadView.
     */
    public function index(): void
    {
        if(!isset($_SESSION)){
            session_start();
        }

        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($this->dataForm['AddContMsg']))
        {
            unset($this->dataForm['AddContMsg']);
            $this->createNewUser();
        }

        $loadView = new \Core\LoadView('sts/Views/login', null);
        $loadView->loadView();
    }

    

    /**     function createNewUser()
     * Chamado pelo método da classe index;
     * Responsavel por verificar se o email e senha do cliente existe no
     *      banco de dados. Faz isso por meio de um OBJ StsLogin;
     * Se existir uma conta com as informações passadas, o usuario é 
     *      redirecionado para a tela home, se não permanece na tela login.
     */
    private function createNewUser(): void
    {
        $this->stsLogin = new \Sts\Models\StsLogin();
        $result = $this->stsLogin->login($this->dataForm);

        if(!empty($result))
        {
            extract($result[0]);

            $_SESSION['idusuario'] = $idusuario;
            $_SESSION['enderecoUsuario'] = $endereco;
            $_SESSION['msg'] = "<p style='color:gree;'> Login realizado com sucesso </p>";

            header("Location: http://localhost/Clinica/Home");
        }else
        {
            $_SESSION['msg'] = "<p style='color:red;'> Usuario não existe </p>";
        }
    }
}
