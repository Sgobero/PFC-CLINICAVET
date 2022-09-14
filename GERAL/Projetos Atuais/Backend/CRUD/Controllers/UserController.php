<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require '../Models/Conn.php';
require "../Models/classes/Usuario.php";
require "../Models/ClienteRepository.php";
$userStart = new UserController();

class UserController
{

    //--------Construtor + Manipula URL--------

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








    public function create(){ //pronto
       
        $usuario = new Usuario();

        $usuario->setNome($_POST["nome"]);
        $usuario->setCpf($_POST["cpf"]);
        $usuario->setRg($_POST["rg"]);
        $usuario->setTelefone($_POST["telefone"]);
        $usuario->setEmail($_POST["email"]);
        $usuario->setSenha($_POST["senha"]);

        $clienteRepository = new ClienteRepository();
        $resultado = $clienteRepository->create($usuario);
    
        if($resultado){
            //$this->loadView("index.php");
            $this->loadIndex();
        }else{
            echo "erro";
        }
    }  
    
    public function update() //pronto
    {   
        $id = $_GET['id'];
        $usuario = new Usuario();

        $usuario->setId($id);
        $usuario->setNome($_POST["nome"]);
        $usuario->setCpf($_POST["cpf"]);
        $usuario->setRg($_POST["rg"]);
        $usuario->setTelefone($_POST["telefone"]);
        $usuario->setEmail($_POST["email"]);

        $clienteRepository = new ClienteRepository();
        $resultado = $clienteRepository->update($usuario);
    
        if($resultado == 1){
            $this->loadIndex();
        }else{
            echo "erro";
        } 
    }

    public function deleteById() //pronto
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuario->setId($id);

        $clienteRepository = new ClienteRepository();
        $resultado = $clienteRepository->delete($usuario);
        
        if($resultado){
            $this->loadIndex();
        }else{
            echo "erro";
        }
    }

    public function edit() //pronto
    {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuario->setId($id);

        $clienteRepository = new ClienteRepository();
        $table = $clienteRepository->findById($usuario);
        $data['clientes'] = $table;

        $this->loadView("formEdit.php", $data);
    } 
    
    public function findAll() //pronto
    {
        $clienteRepository = new ClienteRepository();
        $table = $clienteRepository->findAll();

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