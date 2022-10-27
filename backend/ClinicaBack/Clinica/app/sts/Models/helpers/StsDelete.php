<?php

namespace Sts\Models\helpers;

include_once 'app/sts/Controllers/helpers/protect.php';

use PDOException;
use PDO;

class StsDelete extends StsConn
{
    
    private string $table;
    private string $where;

    private object $conn;
    private object $delete;

    private string $query;

    private string|null $result = null;

    public function getResult(): string|null
    {
        return $this->result;
    }

    public function delete($table, $where):void
    {
        $this->table = $table;
        $this->where = $where;


        $this->exeReplaceValues();
    }

    private function exeReplaceValues(): void
    {

        $this->query =  "DELETE FROM {$this->table} WHERE {$this->where}";

        $this->exeInstruction();
    }

    private function exeInstruction(): void 
    {   
        $this->connection();
        try{
            $this->delete->execute();
            //Resultado recebe o id do último  registro inserido
            $this->result = $this->delete->rowCount();
        }catch(PDOException $err){
            $this->result = null;
        }
    }



    /**
     * Cria o OBJ PDO e prepara a query($this->insert)
     */
    private function connection(): void 
    {
        $this->conn = $this->connectDb();
        $this->delete = $this->conn->prepare($this->query);
    }



}

?>