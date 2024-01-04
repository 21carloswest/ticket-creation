<?php

namespace App\Entity;

use App\Db\Database;

Class Status{

    public $id;

    public $name;

    public $ativo;

    public function __construct($name, $ativo = "1"){
        $this->name = $name;
        $this->ativo = $ativo;
    }

    public function createStatus(){

        $obDatabase = new Database("status");

        $this->id = $obDatabase->insert([
            'NOME_STATUS'=>$this->name,
            'ATIVO_STATUS'=>$this->ativo
        ]);

        return true;

    }

    public function atualizarStatus($id){
        return (new Database('status'))->update('status', 'ID_STATUS = '."$id",[
                                                                    'NOME_STATUS' => $this->name,
                                                                    'ATIVO_STATUS'=> $this->ativo,
                                                                  ]);
      }

}