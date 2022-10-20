<?php

namespace Sts\Models\helpers;

include_once 'app/sts/Controllers/helpers/protect.php';

use PDOException;
use PDO;

class StsUpdate extends StsConn
{

    private string $table;
    private array $data;
    private string $where;
    private string|null $result = null;
    private object $alter;
    private string $query;
    private object $conn;


    /**
     * Metodo chamado pela Models para pegar o resultado
     *      (último id inserido)
     */
    public function getResult(): string|null
    {
        return $this->result;
    }


    /**
     * Método chamado pelas Models
     * Pega a tabela e os dados enviado pela model e insere dentro de 
     *      variaveis da classe
     * Depois chama o método exeReplaceValues
     */
    public function exeAlter(string $table, array $data, string|null $where): void
    {
        $this->table = $table;
        $this->data = $data;
        $this->where = $where;
        echo $this->where;
        $this->exeReplaceValues();
    }


    /**
     * Método chamado por exeAlter
     * Pega as chaves do array date e transforma em uma string
     *      com os termos que serão alterados
     * 
     * Ex: nome_usuario = :nome_usuario, data_nascimento = :data_nascimento
     */
    private function exeReplaceValues(): void
    {

        $dataString = array_keys($this->data);
        $updateValues = '';

        foreach($dataString as $key)
        {
            $updateValues = $updateValues . $key . " = :" . $key . ", ";
        }

        $updateValues = rtrim($updateValues, ", ");

        $this->query = "UPDATE {$this->table} SET {$updateValues} WHERE {$this->where}"; 
        echo $this->query;

        if(!empty($this->where))
        {
        echo "<pre>"; var_dump($this->data); echo "</pre>";

            $this->addWhere();
        }
        $this->exeInstruction();
    }

    


    /**
     * Chama o metodo conectar e executa o query($this->alter)
     */
    private function exeInstruction(): void 
    {   
        $this->connection();
        try
        {
            $this->alter->execute($this->data);
            //Resultado quantas linhas foram afetadas
            $this->result = $this->alter->rowCount(); // string 
        }
        catch(PDOException $err)
        {
            $this->result = null;
        }
    }



    /**
     * Cria o OBJ PDO e prepara a query($this->alter)
     */
    private function connection(): void 
    {
        $this->conn = $this->connectDb();
        $this->alter = $this->conn->prepare($this->query);
    }



    private function addWhere(): void 
    {
        //$this->data['idusuario'] = $_SESSION['idusuario'];
        //$this->data['endereco'] = $_SESSION['enderecoUsuario'];

        var_dump($this->where);

        if($this->where == "idusuario = :idusuario")
        {
            $this->data['idusuario'] = $_SESSION['idusuario'];
        }
        elseif($this->where == "idendereco = :idendereco") 
        {
            $this->data['idendereco'] = $_SESSION['enderecoUsuario'];
            
        }
        echo "<pre>"; var_dump($this->data); echo "</pre>";
    }

}


?>