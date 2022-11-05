<?php 

        extract($this->data);
       
       /* for($x = 0; $x < count($this->data); $x++){
            $clientes = $this->data[$x];
            extract($clientes);
            
            echo   $x+1 . ": " . $idusuario;
            echo   $x+1 . ": " . $nome_usuario  ;
            echo   $x+1 . ": " . $tipo_usuario  ;
            echo   $x+1 . ": " . $email;
            echo "<br>";

     }*/

    echo "LISTA DE USUÁRIOS" . "<br> <br>";
     for($x = 0; $x < count($this->data); $x++)
        {
            $lista = $this->data[$x];
            extract($lista);

            echo "Id do usuário:" . "$idusuario" . "<br/>";
            echo "Nome do usuário:" . "$nome_usuario" . "<br/>"; 
            echo "Tipo do usuário:" . "$tipo_usuario" ."<br/>"; 
            echo "E-mail:" . "$email" ."<br/>"; 

            echo "<br> <hr> <br>";
        }

?>