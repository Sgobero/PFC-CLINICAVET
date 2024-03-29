<<<<<<< Updated upstream
<?php

namespace Sts\Models;

include_once 'app/sts/Controllers/helpers/protect.php';

class StsFotoCarteira
{


    /**     function cadastroFotoPet()
     * Responsavel por cadastrar o endereco da foto do pet no BD
     * Retorna true se conseguiu e false se não 
     */
    public function cadastroFotoCarteira($nameInDB, $id): bool
    {
        $stsUpdate = new \Sts\Models\helpers\StsUpdate();
        $stsUpdate->exeAlter('pet', $nameInDB, 'idpet', $id);
        $resultAlter = $stsUpdate->getResult();
        if(!empty($resultAlter)){
            return true;
        } else {
            return false;
        }
    }



    /**     function apagarFotoPet()
     * Responsavel por apagar o endereco da foto do pet no BD baseado no ID do pet
     * Retorna true se deu certo e false se deu arrado
     */
    public function apagarFotoCarteira($idpet): bool 
    {
        $data = ['imagem_carteira_pet'=> NULL];
        $stsUpdate = new \Sts\Models\helpers\StsUpdate();
        $stsUpdate->exeAlter('pet', $data, 'idpet', $idpet);
        $resultAlter = $stsUpdate->getResult();
        if(!empty($resultAlter)){
            return true;
        } else {
            return false;
        }
    }



    /**     function verificarFoto()
     * Retorna true se não existir foto de pet no bd
     *      caso contrario retorna false
     */
    public function verificarFotoCarteira($idpet)
    {
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT imagem_carteira_pet
                                    FROM pet
                                    WHERE idpet  = :idpet", 
                                    "idpet={$idpet}");
        
        $result = $stsSelect->getResult();

        if (empty($result[0]['imagem_carteira_pet']))
            return true;
        else 
            return false; 
    }



    /**     function verificaDonoPet()
     * Verifica se o ID do pet passado pela URL pertence ao usuario logado 
     * true para verdadeiro e false para falso (meio obvio)
     */
    public function verificaDonoPet($idpet)
    {
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT idusuario
                                    FROM usuario AS u
                                    INNER JOIN pet AS p
                                    ON p.usuario = u.idusuario
                                    WHERE p.idpet  = :idpet AND u.idusuario = :idusuario", 
                                    "idpet={$idpet}&idusuario={$_SESSION['idusuario']}");
        
        $result = $stsSelect->getResult();

        if (empty($result[0]['idusuario']))
            return false;
        else 
            return true; 
    }


    /**     function enderecoImagemPet()
     * Responsavel por retornar o endereco da imagem do pet
     */
    public function enderecoFotoCarteira($idpet): string|null
    {
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT imagem_carteira_pet
                                    FROM pet
                                    WHERE idpet  = :idpet", 
                                    "idpet={$idpet}");
        
        $result = $stsSelect->getResult();
        if (!empty($result[0]['imagem_carteira_pet'])) 
            return $result[0]['imagem_carteira_pet'];
        else 
            return null;
    }

}

=======
<?php

namespace Sts\Models;

include_once 'app/sts/Controllers/helpers/protect.php';

class StsFotoCarteira
{


    /**     function cadastroFotoPet()
     * Responsavel por cadastrar o endereco da foto do pet no BD
     * Retorna true se conseguiu e false se não 
     */
    public function cadastroFotoCarteira($nameInDB, $id): bool
    {
        $stsUpdate = new \Sts\Models\helpers\StsUpdate();
        $stsUpdate->exeAlter('pet', $nameInDB, 'idpet', $id);
        $resultAlter = $stsUpdate->getResult();
        if(!empty($resultAlter)){
            return true;
        } else {
            return false;
        }
    }



    /**     function apagarFotoPet()
     * Responsavel por apagar o endereco da foto do pet no BD baseado no ID do pet
     * Retorna true se deu certo e false se deu arrado
     */
    public function apagarFotoCarteira($idpet): bool 
    {
        $data = ['imagem_carteira_pet'=> NULL];
        $stsUpdate = new \Sts\Models\helpers\StsUpdate();
        $stsUpdate->exeAlter('pet', $data, 'idpet', $idpet);
        $resultAlter = $stsUpdate->getResult();
        if(!empty($resultAlter)){
            return true;
        } else {
            return false;
        }
    }



    /**     function verificarFoto()
     * Retorna true se não existir foto de pet no bd
     *      caso contrario retorna false
     */
    public function verificarFotoCarteira($idpet)
    {
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT imagem_carteira_pet
                                    FROM pet
                                    WHERE idpet  = :idpet", 
                                    "idpet={$idpet}");
        
        $result = $stsSelect->getResult();

        if (empty($result[0]['imagem_carteira_pet']))
            return true;
        else 
            return false; 
    }



    /**     function verificaDonoPet()
     * Verifica se o ID do pet passado pela URL pertence ao usuario logado 
     * true para verdadeiro e false para falso (meio obvio)
     */
    public function verificaDonoPet($idpet)
    {
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT idusuario
                                    FROM usuario AS u
                                    INNER JOIN pet AS p
                                    ON p.usuario = u.idusuario
                                    WHERE p.idpet  = :idpet AND u.idusuario = :idusuario", 
                                    "idpet={$idpet}&idusuario={$_SESSION['idusuario']}");
        
        $result = $stsSelect->getResult();

        if (empty($result[0]['idusuario']))
            return false;
        else 
            return true; 
    }


    /**     function enderecoImagemPet()
     * Responsavel por retornar o endereco da imagem do pet
     */
    public function enderecoFotoCarteira($idpet): string|null
    {
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT imagem_carteira_pet
                                    FROM pet
                                    WHERE idpet  = :idpet", 
                                    "idpet={$idpet}");
        
        $result = $stsSelect->getResult();
        if (!empty($result[0]['imagem_carteira_pet'])) 
            return $result[0]['imagem_carteira_pet'];
        else 
            return null;
    }

}

>>>>>>> Stashed changes
?>