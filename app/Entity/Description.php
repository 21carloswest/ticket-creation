<?php

namespace App\Entity;

use \App\Entity\Ticket;

use \App\Db\Database;

use \PDO;

class Description extends Ticket{

    public $idDesc;

    public $description;

    public $date;

    public $idTicket;

    public function __construct($description, $idTicket){

        $this->description=$description;
        $this->idTicket=$idTicket;

    }

    public function createDescription(){

        $this->date=date('Y-m-d h:m:s');

        $obDBDesc = new Database('descricao');

        $obDBDesc->insert([
            'descricao'=>$this->description,
            'data'=>$this->date,
            'idTicket'=>$this->idTicket
        ]);

    }

    public function atualizarDesc($idDesc){

        return (new Database('descricao'))->update('descricao', 'id = '."$idDesc",[
            'descricao'=>$this->description,
            'data'=>$this->date
          ]);
    }

}