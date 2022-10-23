<?php

namespace Sts\Models;

class StsCadastroPet
{
    
    public function dataPet(string $tipoAnimal): array|null
    {
        $stsSelect = new \Sts\Models\helpers\StsSelect();
        $stsSelect->fullRead("SELECT * FROM raca_pet WHERE tipo_pet = :tipo_pet", "tipo_pet={$tipoAnimal}");
        $result = $stsSelect->getResult();
        if(!empty($result)){
            return $result;
        }else{
            return null; 
        }
    }

    public function createPet(array $data): string|null
    {
        $stsCreate = new \Sts\Models\helpers\StsCreate();
        $stsCreate->exeCreatre("pet",$data);
        $idPet = $stsCreate->getResult();

        if(!empty($idPet)){
            return $idPet;
        }else{
            return null;
        }
    }

}


?>