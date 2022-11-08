<?php

namespace Sts\Models;

include_once 'app/sts/Controllers/helpers/protect.php';
    
class StsSobreCliente
{
    private array|null $data = null;
    private string|null $resultAlter = null;
    private object $stsSelect;

    

    //------------------------ FUNÇÕES DE SELECT -----------------------
    //Funções para pegar registros no BD



    /**     function index()
     * Function chamado pela controller SobreCliente
     * Serve apenas para inicializar outros métodos
     */
    public function getData(): array|null
    {   
        $this->stsSelect = new \Sts\Models\helpers\StsSelect();
        $this->userData();
        $this->userAdress();
        $this->userPet();
        if(!empty($this->data)){
            return $this->data;
        }else{
            return null;
        }
    }



    /**     function userData()
     * Busca os dados da tabela usuario no BD
     */
    private function userData():void
    {
        $this->stsSelect->fullRead("SELECT nome_usuario, data_nascimento 
                                    FROM usuario
                                    WHERE idusuario  = :idusuario", 
                                    "idusuario={$_SESSION['idusuario']}");
        /**"SELECT nome_usuario, cpf, rg, data_nascimento, email 
            FROM usuario
                WHERE idusuario  = :idusuario " */
        
        $this->data['user'] = $this->stsSelect->getResult();                            
    }



    /**     function userAdress()
     * Busca os dados do endereço no BD
     */
    private function userAdress():void
    { 
        $this->stsSelect->fullRead("SELECT e.cep, e.rua, e.numero_residencial, e.cidade, e.estado
                            FROM endereco as e
                            INNER JOIN usuario as u 
                            ON u.endereco = e.idendereco 
                            WHERE u.endereco = :endereco", "endereco={$_SESSION['idendereco']}" );

        $this->data['adress'] = $this->stsSelect->getResult();
    }



    /**     function userPet()
     * Busca os dados do pet no BD
     * Ainda não implementado
     */
    private function userPet():void
    {
        $this->stsSelect->fullRead("SELECT p.idpet, p.nome_pet, p.idade_pet, p.sexo, r.raca, r.tipo_pet 
                                    FROM pet AS p 
                                    INNER JOIN raca_pet AS r 
                                    ON p.raca = r.idraca_pet 
                                    INNER JOIN usuario AS u 
                                    on u.idusuario = p.usuario 
                                    WHERE u.idusuario = :idusuario", "idusuario={$_SESSION['idusuario']}");
        
        $this->data['pet'] = $this->stsSelect->getResult();
    }



    //----------------------- FUNÇÕES DE ALTERAR -----------------------
    //Funções para alterar os registros no BD



    /**     function alterUser()
     * Function para alterar as informações do usuario
     * Ela é chamada pela controller SobreCliente
     * Altera os dados por meio de um OBJ de StsUpdate
     *      chamando o método exeAlter()
     */
    public function alterUser(array $data): string|null
    {
        $stsUpdate = new \Sts\Models\helpers\StsUpdate();
        $stsUpdate->exeAlter('usuario', $data, 'idusuario', $_SESSION['idusuario']);
        $this->resultAlter = $stsUpdate->getResult();

        return $this->resultAlter;
    }



    /**     function alterAdress()
     * Function para alterar as informações do endereço
     * Ela é chamada pela controller SobreCliente
     * Altera os dados por meio de um OBJ de StsUpdate
     *      chamando o método exeAlter()
     */
    public function alterAdress(array $data): string|null 
    {
        $stsUpdate = new \Sts\Models\helpers\StsUpdate();
        $stsUpdate->exeAlter('endereco', $data, 'idendereco', $_SESSION['idendereco']);
        $this->resultAlter = $stsUpdate->getResult();

        return $this->resultAlter;
    }



    /**     function alterPet()
     * Function para alterar as informações do pet
     * Ela é chamada pela controller SobreCliente
     * Altera os dados por meio de um OBJ de StsUpdate
     *      chamando o método exeAlter()
     */
    public function alterPet(array $data): string|null
    {
        $stsUpdate = new \Sts\Models\helpers\StsUpdate();

        extract($data);
        $idAnimal = $idpet;
        unset($data['idpet']);

        $stsUpdate->exeAlter('pet', $data, 'idpet', $idAnimal);
        $resultAlter = $stsUpdate->getResult();

        return $resultAlter;
    }   


    
    /**     function deleteAll()
     * Function para deletar as informações do BD
     *      - $table: em qual tabela vai ser deletada as informações
     *      - $where: qual o campo da tabela que servira de where na query
     *      - $id: o valor do where
     */
    public function deleteAll(String $table, String $where, String $id): string|null
    {
        $stsDelete = new \Sts\Models\helpers\StsDelete();
        $stsDelete->delete($table,$where, $id);
        $resultDelete = $stsDelete-> getResult();

        return $resultDelete;
    }
}

?>