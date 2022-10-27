<?php

namespace Sts\Models;

class StsLogin
{

    /**     function login()
     * Chamda pela controller Login, serve para pegar a senha,
     *      o id e a chave estrangeira de endereco do usuário que
     *      tiver o email passado pelo $data
     */
    public function login(array $data): array|null
    {
        extract($data);
        
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT senha_usuario, idusuario, endereco 
                                FROM usuario 
                                WHERE email=:email", 
                                "email={$email}");

        //"SELECT idusuario, endereco FROM usuario 
        //WHERE email=:email AND senha_usuario=:senha_usuario", 
        //"email={$email}&senha_usuario={$senha_usuario}"

        $userDate = $stsSelect->getResult();
        
        if(!empty($userDate)){
            return $userDate;//retorna um array
        }else{
            return null;
        }
    }
}

?>
