<<<<<<< Updated upstream
<?php

namespace Adms\Models\helpers;

use PDO;
use PDOException;

class AdmsSelect extends AdmsConn{

    private string $select;
    private array $values = [];
    private array|null $result = [];
    private object $query;
    private object $conn;

    public function getResult(){
        return $this->result;
    }

    public function fullRead(string $query, string|null $parseString)
    {
        $this->select = $query;
        if(!empty($parseString)){
            parse_str($parseString, $this->values);
        }
        $this->exeInstruction();
    }

    public function exeInstruction()
    {
        $this->connection();
        
        try{
            $this->exeParametros();
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        }catch(PDOException $e){
            $this->result=null;
        }
    }

    private function connection() 
    {   
        $this->conn = $this->connectDb(); // funcção da AdmsConn // cria um OBJ PDO
        $this->query = $this->conn->prepare($this->select); // prepara o SQL $this->select passando para o $this->query;
        $this->query->setFetchMode(PDO::FETCH_ASSOC); // retornar apenas as chaves da tabela e seu valores "id", "titulo"
    }

    private function exeParametros() 
    {
        //se o array values existir entra no array
        if($this->values){
            foreach($this->values as $link => $value)
            {
                $this->query->bindValue(":{$link}", $value); // (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR)
            }
        }
    }

}

=======
<?php

namespace Adms\Models\helpers;

use PDO;
use PDOException;

class AdmsSelect extends AdmsConn{

    private string $select;
    private array $values = [];
    private array|null $result = [];
    private object $query;
    private object $conn;

    public function getResult(){
        return $this->result;
    }

    public function fullRead(string $query, string|null $parseString)
    {
        $this->select = $query;
        if(!empty($parseString)){
            parse_str($parseString, $this->values);
        }
        $this->exeInstruction();
    }

    public function exeInstruction()
    {
        $this->connection();
        
        try{
            $this->exeParametros();
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        }catch(PDOException $e){
            $this->result=null;
        }
    }

    private function connection() 
    {   
        $this->conn = $this->connectDb(); // funcção da AdmsConn // cria um OBJ PDO
        $this->query = $this->conn->prepare($this->select); // prepara o SQL $this->select passando para o $this->query;
        $this->query->setFetchMode(PDO::FETCH_ASSOC); // retornar apenas as chaves da tabela e seu valores "id", "titulo"
    }

    private function exeParametros() 
    {
        //se o array values existir entra no array
        if($this->values){
            foreach($this->values as $link => $value)
            {
                $this->query->bindValue(":{$link}", $value); // (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR)
            }
        }
    }

}

>>>>>>> Stashed changes
?>