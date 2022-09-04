<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

class UsuarioControllers{


    //---------------------Professo--------------------------

    function __construct()
    {
        //pega o action passado pela URL
		if(isset($_POST["action"])){ 
			$action = $_POST["action"];
		}else if(isset($_GET["action"])){
			$action = $_GET["action"];
		}

        // chama o metodo requisitado pela URL
		if(isset($action)){
			$this->callAction($action); 
		}else{
			$msg = "Nenhuma acao a ser processada...";
            print_r($msg);
		}
	}
 
    public function callAction(string $functionName = null)
    {
        if (method_exists($this, $functionName)) {
            $this->$functionName();//Apenas chama os métodos passados pela URL action 
        
        } else if(method_exists($this, "preventDefault")) {
            $met = "preventDefault";
            $this->$met();
        
        } else {
            throw new BadFunctionCallException("Usecase not exists");
        }
    }

    public function loadView(string $path, array $data = null, string $msg = null){ 
        $caminho = __DIR__ . "/../views/" . $path;
        // echo("msg=");
        // print_r($msg);
        if(file_exists($caminho)){
             require $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    //---------------------Professo--------------------------

}

/**
 * callAction
 * loadViews
 * create
 * loadFormNew
 * fundAll
 * findClienteById
 * deleteClienteById
 * edit
 * update
 * preventDeFault
 */

?>