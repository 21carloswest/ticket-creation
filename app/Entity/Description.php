<?php

namespace App\Entity;

use \App\Entity\Ticket;

use \App\Db\Database;



class Description extends Ticket{

    public $idDesc;

    public $description;

    public $date;

    public $idTicket;

    public function __construct($description = null){

        $this->description=$description;

    }

    public function createDescription(){

        $this->date=date('Y-m-d h:m:s');

        $obDBDesc = new Database('descricao');

        $this->id = $obDBDesc->insert([
            'descricao'=>$this->description,
            'data'=>$this->date,
            'idTicket'=>$this->idTicket
        ]);

    }

    public function setIdTicket($value){
        $this->idTicket=$value;
    }

}
