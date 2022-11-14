<?php

namespace Sts\Controllers;

class Cadastro{

    private array|string|null $data = [];
    private array|string|null $dataForm;

    private array|null $dataFile = null;
    private string|null $path = null;

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

        else {
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
            if ($this->verifyFile()) { // verifica imagem
                $this->data[0]['foto_usuario'] = $this->path;
                $this->createNewAccount();
            } else {
                $header = URL . "Cadastro"; 
                header("Location: {$header}"); // ira mostrar a mensagem de $_SESSION['errFile'} na view cadastro 
            }
            
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



    /**
     * Undocumented function
     *
     */
    private function verifyFile(): bool
    {
        if (isset($_FILES['arquivo'])){
            $this->dataFile = $_FILES['arquivo'];

            if ($this->dataFile['error']) // falha ao carregar arquivo
            {
                $_SESSION['errFile'] = "Erro ao receber imagem";
                return false;
            }

            elseif ($this->dataFile['size'] > 2097152) // arquivo maior que 2 mg
            { 
                $_SESSION['errFile'] = "Arquivo muito grande";
                return false;
            } 

            else // arquivo recebido
            {
                // pega o tipo do arquivo (.pdf, .png ...)
                $extensao = strtolower(pathinfo($this->dataFile['name'], PATHINFO_EXTENSION));

                if ($extensao != "jpg" && $extensao != "png") // se não for um arquivo jpg ou png
                {
                    $_SESSION['errFile'] = "tipo de arquivo não aceito";
                    return false;
                } else 
                {
                    return $this->saveFile($extensao);
                }
            }
        } 

        else 
        {
            $_SESSION['errFile'] = "Não anexou imagem";
            return false;
        }
    }



    /**
     * Undocumented function
     *
     */
    private function saveFile($extensao): bool 
    {
        $pasta = "app\sts\Helpers\imagens/";
        $nomeUnicoArquivo = uniqid();
        $this->path = $pasta . $nomeUnicoArquivo . "." . $extensao;

        $save = move_uploaded_file($this->dataFile['tmp_name'], $this->path); // salvar o arquivo na pasta
        if($save){ // se salvar corretamente 
            return true;
        }
        else { // se tiver algum erro no save
            $_SESSION['errFile'] = "falha ao salvar arquivo";
            return false;
        }
        
    }
}

?>