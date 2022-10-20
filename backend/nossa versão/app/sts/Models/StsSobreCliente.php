<?php

namespace Sts\Models;

include_once 'app/sts/Controllers/helpers/protect.php';
    
class StsSobreCliente
{
    private array $data;
    private string|null $result;
    private object $stsSelect;

    
    //---------------------- FUNÇÃO PEGAR RESULT -----------------------
    // métodos chamados pela controller SobreCliente 
    //      para pegar os resultados das consultas
    

    public function getData(): array|null
    {
        return $this->data;
    }

    public function getResult(): string|null
    {
        return $this->result;
    }



    //------------------------ FUNÇÕES DE SELECT -----------------------
    //Funções para pegar registros no BD



    /**     function index()
     * Método chamado pela controller SobreCliente
     * Serve apenas para inicializar outros métodos
     */
    public function index():void
    {   
        $this->stsSelect = new \Sts\Models\helpers\StsSelect();
        $this->userData();
        $this->userAdress();
        $this->userPet();
    }


    /**     function userData()
     * Busca os dados da tabela usuario no BD
     */
    private function userData():void
    {
        $this->stsSelect->fullRead("SELECT nome_usuario, data_nascimento 
                                    FROM usuario
                                    WHERE idusuario  = :idusuario ", 
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
                            WHERE u.endereco = :endereco", "endereco={$_SESSION['enderecoUsuario']}" );

        $this->data['adress'] = $this->stsSelect->getResult();
    }


    /**     function userPet()
     * Busca os dados do pet no BD
     * Ainda não implementado
     */
    private function userPet():void
    {
        $this->data['pet'] = null;
    }



    //----------------------- FUNÇÕES DE ALTERAR -----------------------
    //Funções para alterar os registros no BD



    /**     function alterUser()
     * Função para alterar as informações do usuario
     * Ela é chamada pela controller SobreCliente
     * Altera os dados por meio de um OBJ de StsUpdate
     *      chamando o método exeAlter()
     */
    public function alterUser(array $data): void
    {
        $sts = new \Sts\Models\helpers\StsUpdate();
        $sts->exeAlter('usuario', $data, 'idusuario = :idusuario');
        $this->result = $sts->getResult();
    }


    /**     function alterAdress()
     * Função para alterar as informações do endereço
     * Ela é chamada pela controller SobreCliente
     * Altera os dados por meio de um OBJ de StsUpdate
     *      chamando o método exeAlter()
     */
    public function alterAdress(array $data): void 
    {
        $sts = new \Sts\Models\helpers\StsUpdate();
        $sts->exeAlter('endereco', $data, 'idendereco = :idendereco');
        $this->result = $sts->getResult();
    }


    /**     function alterPet()
     * Ainda não implementado
     */
    public function alterPet(): string|bool
    {
        //null
    }    
}

?>