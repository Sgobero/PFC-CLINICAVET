<?php

namespace Sts\Controllers;

class Login{
    
    private array|string|null $date = [];
    private array|string|null $dataForm;
    private object $stsLogin;


    /**     function index()
     * Método chamado pela UrlController;
     * Primeiro pode receber informações do formulario login, se receber
     *      chama o método da classe createNewUser();
     * Responsável por carregar a tela login por meio de um OBJ LoadView.
     */
    public function index(): void
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['idusuario']))
        {
            echo "Você ja está logado <br>";
            echo "Se quiser logar com outra conta realize primeiro o logout";
        }else
        {
            $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if(!empty($this->dataForm['AddContMsg']))
            {
                unset($this->dataForm['AddContMsg']);
                $this->createLogin();
            }

            $loadView = new \Core\LoadView('sts/Views/login', null, null);
            $loadView->loadView();
        }        
    }

    

    /**     function createLogin()
     * Chamado pelo método da classe index();
     * Responsavel por verificar se o email e senha do cliente existe no
     *      banco de dados. Faz isso por meio de um OBJ StsLogin;
     * A senha está criptografada, por isso a função password_verify()
     * Se existir uma conta com as informações passadas, o usuario é 
     *      redirecionado para a tela home, se não permanece na tela login.
     */
    private function createLogin(): void
    {
        $this->stsLogin = new \Sts\Models\StsLogin();
        $result = $this->stsLogin->login($this->dataForm);

        if(!empty($result))
        {
            $senha = $result[0]['senha_usuario'];

            if(password_verify($this->dataForm['senha_usuario'], $senha))
            {
                $r = $result[0];
                extract($r);
                
                $_SESSION['idusuario'] = $idusuario;
                $_SESSION['idendereco'] = $endereco; //enderecoUsuario
                $_SESSION['msg'] = "Login realizado com sucesso";

                header("Location: http://localhost/ClinicaBack/Clinica/Home");
            }

        }
        else
        {
            $_SESSION['msg'] = "<p style='color:red;'> Usuario não existe </p>";
        }
    }
}