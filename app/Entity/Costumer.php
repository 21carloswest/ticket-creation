<?php

namespace App\Entity;

use App\Db\Database;

Class Costumer{

    public $id;

    public $sysId;

    public $name;

    public $company;

    public $email;

    public $cell;

    public $tel;

    public $link;

    public $CNPJ;

    public $cod;

    public $ativo;

    public function __construct($sysId = null, $name = null, $company = null, $email = null, $cell = null, $tel = null, $link = null, $CNPJ = null, $cod = null, $ativo = "1"){
        $this->sysId=$sysId;
        $this->name = $name;
        $this->company = $company;
        $this->email = $email;
        $this->cell = $cell;
        $this->tel = $tel;
        $this->link = $link;
        $this->CNPJ = $CNPJ;
        $this->cod = $cod;
        $this->ativo = $ativo;
    }

    public function createCostumer(){

        $obDatabase = new Database("cliente");

        $this->id = $obDatabase->insert([
            'ID_SISTEMA'=>$this->sysId,
            'NOME_CLIENTE'=>$this->name,
            'EMPRESA'=>$this->company,
            'EMAIL_CLIENTE'=>$this->email,
            'TELEFONE_CLIENTE'=>$this->tel,
            'CELULAR_CLIENTE'=>$this->cell,
            'LINK'=>$this->link,
            'CNPJ'=>$this->CNPJ,
            'COD_CLIENTE'=>$this->cod,
            'ATIVO_CLIENTE'=>$this->ativo
        ]);

        return true;
    }

    public function atualizarCostumer($id){
        return (new Database('cliente'))->update('cliente', 'ID_CLIENTE = '."$id",[
                                                                                    'ID_SISTEMA'=>$this->sysId,
                                                                                    'NOME_CLIENTE'=>$this->name,
                                                                                    'EMPRESA'=>$this->company,
                                                                                    'EMAIL_CLIENTE'=>$this->email,
                                                                                    'TELEFONE_CLIENTE'=>$this->tel,
                                                                                    'CELULAR_CLIENTE'=>$this->cell,
                                                                                    'LINK'=>$this->link,
                                                                                    'CNPJ'=>$this->CNPJ,
                                                                                    'COD_CLIENTE'=>$this->cod,
                                                                                    'ATIVO_CLIENTE'=>$this->ativo
                                                                                ]);
      }

}