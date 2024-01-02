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

        $obDB = new Database('SLA');

        $this->id_SLA = $obDB->insert([
            'DESCRIÇAO_SLA	'=>$this->name,
            'ATIVO_SLA'=>$this->ativo
        ]);

        return true;
    }

    public function atualizarSLA(){
        return (new Database('SLA'))->update('SLA', 'id = '.$this->id_SLA,[
                                                                    'id_SLA'    => $this->id_SLA,
                                                                    'DESCRIÇAO_SLA' => $this->name,
                                                                    'ATIVO_SLA'     => $this->ativo,
                                                                  ]);
      }

}