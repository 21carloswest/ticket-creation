<?php

namespace App\Db;

use PDO;

use \App\Db\Database;

#[\AllowDynamicProperties]

class Select{

    public static function getTicket($table, $id){
        return ((new Database('ticket'))->select($table, 'id='.$id))->fetchObject(self::class);
    }

    public static function getDescription($table, $id, $order = 'id DESC'){
        return ((new Database('descricao'))->select($table, 'idTicket='.$id, $order))->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getSLAs($table = 'SLA', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('SLA'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getSLAsAtiva($table = 'SLA', $where= "`ATIVO_SLA` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('SLA'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getSLA($table, $id){
        return ((new Database('SLA'))->select($table, 'id='.$id))->fetchObject(self::class);
    }
}