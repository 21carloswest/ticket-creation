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
        return ((new Database('SLA'))->select($table, 'ID_SLA='.$id))->fetchObject(self::class);
    }

    public static function getTags($table = 'tag', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('tag'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getTagsAtivas($table = 'tag', $where= "`ATIVO_TAG` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('tag'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getTag($table, $id){
        return ((new Database('tag'))->select($table, 'ID_TAG='.$id))->fetchObject(self::class);
    }

    public static function getStatus($table = 'status', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('status'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getStatusAtivos($table = 'status', $where= "`ATIVO_STATUS` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('status'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getOneStatus($table, $id){
        return ((new Database('status'))->select($table, 'ID_STATUS='.$id))->fetchObject(self::class);
    }
}