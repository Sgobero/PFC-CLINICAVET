<?php

namespace Sts\Models;

class StsCadastro{

    /** function verifyAcount
     * verifica se os dados CPF, RG ou EMAIL que o cliente tentou
     * registrar já estão cadastradas no banco de dados (conta já criada)
     * retorna false se já existe uma conta criada com esses dados e true se não 
     */
    public function verifyAccount(array $data): bool
    {   

        extract($data);

        $stsSelect = new \Sts\Models\helpers\StsSelect();

        $stsSelect->fullRead("SELECT email FROM usuario 
                            WHERE cpf = :cpf or rg = :rg or email = :email",
                            "cpf={$cpf}&rg={$rg}&email={$email}");

        $resultado =  $stsSelect->getResult();

        if(empty($resultado)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Responsavel por criar a conta do Usuário
     */
    public function createAccount(array $data): string|null
    {

        $stsCreate = new \Sts\Models\helpers\StsCreate();
        $stsCreate->exeCreatre("endereco",$data[1]); //primeiro cria o endereco
        $idEndereco = $stsCreate->getResult();

        if(!empty($idEndereco))
        {
            $data[0]['endereco'] = $idEndereco; // add endereco e id para a FK
            $stsCreate->exeCreatre("usuario",$data[0]);
            $idCliente = $stsCreate->getResult();

            return $idCliente;
        }else{
            return null;
        }
    }
}

?>