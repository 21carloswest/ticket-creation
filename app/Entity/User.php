<?php

namespace App\Entity;

use App\Db\Database;

Class User{

    public $id;

    public $idTeam;

    public $name;

    public $email;

    public $ext;

    public $ativo;

    public function __construct($idTeam = null, $name = null, $email = null, $ext = null, $ativo = "1"){
        $this->idTeam=$idTeam;
        $this->name = $name;
        $this->email = $email;
        $this->ext = $ext;
        $this->ativo = $ativo;
    }

    public function createUser(){

        $obDatabase = new Database("usuario");

        $this->id = $obDatabase->insert([
            'ID_EQUIPE'=>$this->idTeam,
            'NOME_USUARIO'=>$this->name,
            'EMAIL_USUARIO'=>$this->email,
            'RAMAL'=>$this->ext,
            'ATIVO_USUARIO'=>$this->ativo
        ]);

        return true;
    }

    public function atualizarUser($id){
        return (new Database('usuario'))->update('usuario', 'ID_USUARIO = '."$id",[
                                                                                    'ID_EQUIPE'=>$this->idTeam,
                                                                                    'NOME_USUARIO'=>$this->name,
                                                                                    'EMAIL_USUARIO'=>$this->email,
                                                                                    'RAMAL'=>$this->ext,
                                                                                    'ATIVO_USUARIO'=>$this->ativo
                                                                                ]);
      }

}