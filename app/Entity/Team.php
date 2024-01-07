<?php

namespace App\Entity;

use App\Db\Database;

Class Team{

    public $id;

    public $name;

    public $ativo;

    public function __construct($name, $ativo = "1"){
        $this->name = $name;
        $this->ativo = $ativo;
    }

    public function createTeam(){

        $obDatabase = new Database("equipe");

        $this->id = $obDatabase->insert([
            'NOME_EQUIPE'=>$this->name,
            'ATIVO_EQUIPE'=>$this->ativo
        ]);

        return true;

    }

    public function atualizarTeam($id){
        return (new Database('equipe'))->update('equipe', 'ID_EQUIPE = '."$id",[
                                                                    'NOME_EQUIPE' => $this->name,
                                                                    'ATIVO_EQUIPE'=> $this->ativo,
                                                                  ]);
      }

}