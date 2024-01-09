<?php

namespace App\Entity;

use App\Db\Database;

Class SLA {

    public $id_SLA;

    public $name;

    public $ativo;

    public function __construct($name, $ativo = "1"){
        $this->name = $name;
        $this->ativo = $ativo;
    }

    public function createSLA(){

        $obDB = new Database('sla');

        $this->id_SLA = $obDB->insert([
            'DESCRIÇAO_SLA	'=>$this->name,
            'ATIVO_SLA'=>$this->ativo
        ]);

        return true;
    }

    public function atualizarSLA($id){
        return (new Database('sla'))->update('sla', 'ID_SLA = '."$id",[
                                                                    'DESCRIÇAO_SLA' => $this->name,
                                                                    'ATIVO_SLA'     => $this->ativo,
                                                                  ]);
      }

}