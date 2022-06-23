<?php 

    class Controller {

        public static function callUseCase(string $useCase = null){

            if(function_exists($useCase)){
                call_user_func($useCase);
            
            } else {
                throw new Exception("O caso de uso chamado não existe");
            }

        }

        public static function loadView(string $path, array $data = null){

            extract($data); //pesquisar sobre!
            
            $caminho = __DIR__ . "/../views/" . $path;
       
            if(file_exists($caminho)){
                 require $caminho;
            } else {
                print "errro";
            }
        }
    } //fim da classe

    
    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];
    } else {
        $acao = "preventDefault";
    }
    
    Controller::callUseCase($acao);
