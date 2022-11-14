<?php

namespace Sts\Controllers;

class Imagem{
    
    public function index(){

        $dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $arquivo = $_FILES['arquivo'];

        if(isset($_FILES['arquivo'])) {
            
            echo "<pre>"; var_dump($_FILES['arquivo']); echo "</pre>"; 
            
            $arquivo = $_FILES['arquivo']; // name / full_path / type / tmp_name (nome temporario) / error / size 

            if($arquivo['error'])
                die("Falha ao enviar arquivo");

            if ($arquivo['size'] > 2097152)
                die("arquivo muito grande");


            $pasta = "app\sts\Helpers\imagens/";
            $nomeAleatorioDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

            $path = $pasta . $nomeAleatorioDoArquivo . "." . $extensao;

            if ($extensao != "jpg" && $extensao != "png") 
                die ("Tipo de arquivo não aceito");
            
            $deuCerto = move_uploaded_file($arquivo['tmp_name'], $path);

            if($deuCerto)
                echo "<p> Arquivo enviado com sucesso! para acessa-lo, <a target='_blank' href='app\sts\Helpers\imagens/$nomeAleatorioDoArquivo . $extensao'> clique aqui </a> </p>" ;
            else 
                echo "falha ao enviar arquivo";
        }

        $this->view();
    }

    private function view(){
        $loadView = new \Core\LoadView('sts/Views/imagem', null, null);
        $loadView->loadView();
    }
    
}