<?php

namespace App\Entity;

use \App\Db\Database;

use \PDO;

#[\AllowDynamicProperties]


Class Ticket{

    public $id;

    public $title;

    public $status;

    public $sys;

    public $SLA;

    public $GCM = null;

    public $author;

    public $idCostumer;

    public $tag;

    public $date;

    public $idCategory;

    public function __construct($title = null, $status = null , $sys = null, $SLA = null, $GCM = null, $author  = null, $idCostumer = null, $tag=null, $idCategory = null){

        $this->title=$title;
        $this->status=$status;
        $this->sys=$sys;
        $this->SLA=$SLA;
        $this->GCM=$GCM;
        $this->author=$author;
        $this->idCostumer=$idCostumer;
        $this->tag=$tag;
        $this->idCategory=$idCategory;
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
            'idCliente'=>$this->idCostumer,
            'idTag'=>$this->tag,
            'idCategoria'=>$this->idCategory
        ]);
        return true;

    }

    public function getID(){
        return $this->id;
    }

    public static function getTickets($where = null, $order = 'id DESC', $limit = '20'){
        return (new Database('ticket'))->select('ticket', $where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }






}