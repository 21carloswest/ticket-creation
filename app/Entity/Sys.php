<?php

namespace App\Entity;

use App\Db\Database;

Class Sys{

    public $id;

    public $name;

    public $ativo;

    public function __construct($name, $ativo = "1"){
        $this->name = $name;
        $this->ativo = $ativo;
    }

    public function createSys(){

        $obDatabase = new Database("sistema");

        $this->id = $obDatabase->insert([
            'NOME_SISTEMA'=>$this->name,
            'ATIVO_SISTEMA'=>$this->ativo
        ]);

        return true;

    }

    public function atualizarSys($id){
        return (new Database('sistema'))->update('sistema', 'ID_SISTEMA = '."$id",[
                                                                    'NOME_SISTEMA' => $this->name,
                                                                    'ATIVO_SISTEMA'=> $this->ativo,
                                                                  ]);
      }

}