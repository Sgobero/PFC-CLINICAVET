<?php

namespace Adms\Models;

class AdmsMostrarClientes{

    public function mostraClientes()
    {
        
        $AdmsSelect = new \Adms\Models\helpers\AdmsSelect();
        $AdmsSelect->fullRead("SELECT  idusuario, nome_usuario, tipo_usuario, email 
                                FROM usuario order by tipo_usuario DESC",null);

        $userDate = $AdmsSelect->getResult();
        if(!empty($userDate)){
            return $userDate;//retorna um array
        }else{
            return null;
        }
    }
    

}


?>