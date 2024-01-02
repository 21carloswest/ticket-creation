<?php

namespace App\Entity;

use \App\Db\Database;

Class Ticket {

    protected $id;

    private $title;

    private $description;

    private $status;

    private $sys;

    private $SLA;

    private $GCM = null;

    private $author;

    private $idCostumer;

    private $tag;

    private $date;

    public function __construct($title, $description, $status, $sys, $SLA, $GCM, $author, $idCostumer, $tag){

        $this->title=$title;
        $this->description=$description;
        $this->status=$status;
        $this->sys=$sys;
        $this->SLA=$SLA;
        $this->GCM=$GCM;
        $this->author=$author;
        $this->idCostumer=$idCostumer;
        $this->tag=$tag;
        
    }

    
    public function createTicket(){
        $this->date=date("Y-m-d H:i:s");

        $obDatabase = new Database("ticket");

        $this->id = $obDatabase->insert([
            'titulo'=>$this->title,
            'idStatus'=>$this->status,
            'idSistema'=>$this->sys,
            'SLA'=>$this->SLA,
            'GCM'=>$this->GCM,
            'data'=>$this->date,
            'idResponsavel'=>$this->author,
            'idCliente'=>$this->idCostumer
        ]);
        
    }

    public function getID(){
        return $this->id;
    }

    public function __get($atrib){
        return $atrib;
    }
    
    
}

/*
description
status
sys
SLA
GCM
author
idCostumer
tag
*/
