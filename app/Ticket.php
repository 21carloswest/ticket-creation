<?php

namespace App\Entity;

Class Ticket{

    private $id;

    private $title;

    private $description;

    private $status;

    private $sys;

    private $SLA;

    private $GCM = null;

    private $author;

    private $idCostumer;

    private $tag;

    function __construct($title, $description, $status, $sys, $SLA, $author, $idCostumer, $tag){

        $this->title=$title;
        $this->description=$description;
        $this->status=$status;
        $this->sys=$sys;
        $this->SLA=$SLA;
        $this->author=$author;
        $this->idCostumer=$idCostumer;
        $this->idCostumer=$tag;
        
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
