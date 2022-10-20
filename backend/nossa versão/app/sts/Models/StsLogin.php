<?php

namespace Sts\Models;

class StsLogin
{
    public function login(array $data): array|null
    {
        extract($data);
        
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT idusuario, endereco FROM usuario 
                            WHERE email=:email AND senha_usuario=:senha_usuario", 
                            "email={$email}&senha_usuario={$senha_usuario}");

        $userDate = $stsSelect->getResult();
        
        if(!empty($userDate)){
            return $userDate;//retorna um array
        }else{
            return null;
        }
    }
}

?>
