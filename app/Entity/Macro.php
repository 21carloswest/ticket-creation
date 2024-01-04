<?php

namespace App\Entity;

use App\Db\Database;

Class Macro{

    public $id;

    public $title;

    public $text;

    public $ativo;

    public function __construct($title, $text, $ativo = "1"){
        $this->title = $title;
        $this->text = $text;
        $this->ativo = $ativo;
    }

    public function createMacro(){

        $obDatabase = new Database("macro");

        $this->id = $obDatabase->insert([
            'TITULO_MACRO'=>$this->title,
            'TEXTO_MACRO'=>$this->text,
            'ATIVO'=>$this->ativo
        ]);

        return true;

    }

    public function atualizarMacro($id){
        return (new Database('macro'))->update('macro', 'ID_MACRO = '."$id",[
                                                                            'TITULO_MACRO'=>$this->title,
                                                                            'TEXTO_MACRO'=>$this->text,
                                                                            'ATIVO'=>$this->ativo
                                                                  ]);
      }

}