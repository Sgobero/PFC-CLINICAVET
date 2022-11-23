<?php

namespace Classes;

use Models\ModelConnect;
use PDO;

class ClassEvents extends ModelConnect {

    #Trazer os dados de eventos do BD
    public function getEvents() {

        $b = $this->connectDB()->prepare("select * from events");
        $b->execute();
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }
}

?>