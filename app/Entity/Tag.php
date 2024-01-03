<?php

namespace App\Entity;

use App\Db\Database;

Class Tag{

    public $id;

    public $name;

    public $ativo;

    public function __construct($name, $ativo = "1"){
        $this->name = $name;
        $this->ativo = $ativo;
    }

    public function createTag(){

        $obDatabase = new Database("tag");

        $this->id = $obDatabase->insert([
            'NOME_TAG'=>$this->name,
            'ATIVO_TAG'=>$this->ativo
        ]);

        return true;

    }

    public function atualizarTag($id){
        return (new Database('tag'))->update('tag', 'ID_TAG = '."$id",[
                                                                    'NOME_TAG' => $this->name,
                                                                    'ATIVO_TAG'=> $this->ativo,
                                                                  ]);
      }

}