<?php

namespace Sts\Models;

class StsLogin
{
    public function login(array $data): array|null
    {
        extract($data);
        
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT idusuario FROM usuario 
                            WHERE email=:email AND senha_usuario=:senha_usuario", 
                            "email={$email}&senha_usuario={$senha_usuario}");

        $idUsuario = $stsSelect->getResult();
        
        if(!empty($idUsuario)){
            return $idUsuario;
        }else{
            return null;
        }
    }
}

?>