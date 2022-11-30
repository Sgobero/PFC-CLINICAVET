<?php

namespace Classes;

use Models\ModelConnect;
use PDO;
use Throwable;

class ClassEvents extends ModelConnect {

    #Trazer os dados de eventos do BD
    public function getEvents() {

        $b = $this->connectDB()->prepare("select * from events");
        $b->execute();
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }

    # Criação da consulta no BD
    public function createEvent($id=0, $title, $description, $color='orange', $start, $end)
    {
        $criar=$this->connectDB()->prepare("insert into events values (?,?,?,?,?,?)");
        $criar->bindParam(1, $id, \PDO::PARAM_INT);
        $criar->bindParam(2, $title, \PDO::PARAM_STR);
        $criar->bindParam(3, $description, \PDO::PARAM_STR);
        $criar->bindParam(4, $color, \PDO::PARAM_STR);
        $criar->bindParam(5, $start, \PDO::PARAM_STR);
        $criar->bindParam(6, $end, \PDO::PARAM_STR);

        $criar->execute();
    }

    #Buscar por id
    public function getEventsById($id)
    {
        $getId = $this->connectDB()->prepare("select * from events where id=?");
        $getId->bindParam(1, $id, \PDO::PARAM_INT);
        $getId->execute();
        return $f = $getId->fetch(\PDO::FETCH_ASSOC);
    }
    
    # Update da consulta no BD
    public function updateEvent($id, $title, $description, $start)
    {
        $update=$this->connectDB()->prepare("update events set title=?, description=?, start=? where id=?");
        $update->bindParam(1, $title, \PDO::PARAM_STR);
        $update->bindParam(2, $description, \PDO::PARAM_STR);
        $update->bindParam(3, $start, \PDO::PARAM_STR);
        $update->bindParam(4, $id, \PDO::PARAM_INT);
        $update->execute();
    }

    # Deletar consulta no BD
    public function deleteEvent($id)
    {
        $delete=$this->connectDB()->prepare("delete from events where id=?");
        $delete->bindParam(1, $id, \PDO::PARAM_INT);
        $delete->execute();
    }
}

?>