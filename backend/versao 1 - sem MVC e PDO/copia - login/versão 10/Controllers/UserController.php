<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require '../Models/Conn.php';
require "../Models/classes/Usuario.php";
require "../Models/classes/Cliente.php";
$userStart = new UserController();

class UserController
{
    //-------------------Professor------------------

    function __construct()
    {
		if(isset($_POST["action"])){
            $action = $_POST["action"];
        }
        elseif(isset($_GET["action"])){
            $action = $_GET["action"];
        }
        else{
            $action = "loadPainel";
        }

        if(isset($action)){
            $this->callAction($action); 
        }
        else{ echo "Nenhuma acao a ser processada..."; }
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
    public function loadView(string $path, array $data = null, string $msg = null)
    { 
        $caminho = __DIR__ . "/../views/" . $path;
        //var_dump($data);
        if(file_exists($caminho)){
            require $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }     
    
    //--------------------Metodos Do CRUD--------------------

    public function create(){
       
        $cliente = new Cliente();

        $cliente->setNome($_POST["nome"]);
        $cliente->setCpf($_POST["cpf"]);
        $cliente->setRg($_POST["rg"]);
        $cliente->setTelefone($_POST["telefone"]);
        $cliente->setEmail($_POST["email"]);
        $cliente->setSenha($_POST["senha"]);

        $resultado = $cliente->create($cliente);
    
        if($resultado){
            //$this->loadView("index.php");
            $this->loadIndex();
        }else{
            echo "erro";
        }
    }  
    
    public function update()
    {
        $cliente = new Cliente();

        $cliente->setNome($_POST["nome"]);
        $cliente->setCpf($_POST["cpf"]);
        $cliente->setRg($_POST["rg"]);
        $cliente->setTelefone($_POST["telefone"]);
        $cliente->setEmail($_POST["email"]);

        $resultado = $cliente->edit($cliente);
    
        if($resultado){
            $this->loadIndex();
        }else{
            echo "erro";
        } 
    }

    public function edit()
    {
        $id = $_GET['id'];
        $cliente = new Cliente();
        $cliente->setId($id);
        $table = $cliente->findById();
        $data['clientes'] = $table;

        $this->loadView("formEdit.php", $data);
    }
    
    public function findAll()
    {
        $cliente = new Cliente();
        $table = $cliente->findAll();

        $data['clientes'] = $table;
        $this->loadView("list.php", $data);
    }


    //-----------------Chamada para as telas-----------------


    public function loadFormNew()
    {
        $this->loadView("formNew.php");
    }

    private function loadPainel()
    { 
        $this->loadView("painel.php");
    }
    public function loadIndex(){
        header("Location: ../index.php");
    }  
}



/**
 * callAction V
 * loadViews V
 * create V
 * loadFormNew
 * fundAll
 * findClienteById
 * deleteClienteById
 * edit
 * update
 * preventDeFault
 */

?>