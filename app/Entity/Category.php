<?php

namespace App\Entity;

use App\Db\Database;

Class Category{

    public $id;

    public $name;

    public $ativo;

    public function __construct($name, $ativo = "1"){
        $this->name = $name;
        $this->ativo = $ativo;
    }

    public function createCategory(){

        $obDatabase = new Database("categoria");

        $this->id = $obDatabase->insert([
            'DESCRICAO_CATEGORIA'=>$this->name,
            'ATIVO_CATEGORIA'=>$this->ativo
        ]);

        return true;

    }

    public function atualizarCategory($id){
        return (new Database('categoria'))->update('categoria', 'ID_CATEGORIA = '."$id",[
                                                                    'DESCRICAO_CATEGORIA' => $this->name,
                                                                    'ATIVO_CATEGORIA'=> $this->ativo,
                                                                  ]);
      }

}