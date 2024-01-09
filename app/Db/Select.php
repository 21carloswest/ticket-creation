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

    public static function getSLAs($table = 'sla', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('sla'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getSLAsAtiva($table = 'sla', $where= "`ATIVO_SLA` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('sla'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getSLA($table, $id){
        return ((new Database('sla'))->select($table, 'ID_SLA='.$id))->fetchObject(self::class);
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

    public static function getMacros($table = 'macro', $where =null, $order = null, $limit = null, $fields="`ID_MACRO`, `TITULO_MACRO`, `ATIVO`"){
        return ((new Database('status'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    /*public static function getMacroAtivos($table = 'macro', $where= "`ATIVO_MACRO` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('macro'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    } será implementado no ticket*/

    public static function getMacro($table, $id){
        return ((new Database('macro'))->select($table, 'ID_MACRO='.$id))->fetchObject(self::class);
    }

    public static function getCategories($table = 'categoria', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('categoria'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getCategoriesAtivas($table = 'categoria', $where= "`ATIVO_CATEGORIA` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('categoria'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getCategory($table, $id){
        return ((new Database('categoria'))->select($table, 'ID_CATEGORIA='.$id))->fetchObject(self::class);
    }

    public static function getSys($table = 'sistema', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('sistema'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getSysAtivos($table = 'sistema', $where= "`ATIVO_SISTEMA` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('sistema'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getOneSys($table, $id){
        return ((new Database('sistema'))->select($table, 'ID_SISTEMA='.$id))->fetchObject(self::class);
    }

    public static function getTeams($table = 'equipe', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('equipe'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getTeamsAtivos($table = 'equipe', $where= "`ATIVO_EQUIPE` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('equipe'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getTeam($table, $id){
        return ((new Database('equipe'))->select($table, 'ID_EQUIPE='.$id))->fetchObject(self::class);
    }

    public static function getUsers($table = 'usuario', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('usuario'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getUsersAtivos($table = 'usuario', $where= "`ATIVO_USUARIO` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('usuario'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getUser($table, $id){
        return ((new Database('usuario'))->select($table, 'ID_USUARIO='.$id))->fetchObject(self::class);
    }

    public static function getCostumers($table = 'cliente', $where =null, $order = null, $limit = null, $fields="*"){
        return ((new Database('cliente'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getCostumersAtivos($table = 'cliente', $where= "`ATIVO_CLIENTE` = '1'", $order = null, $limit = null, $fields="*"){
        return ((new Database('cliente'))->select($table, $where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class));
    }

    public static function getCostumer($table, $id){
        return ((new Database('cliente'))->select($table, 'ID_CLIENTE='.$id))->fetchObject(self::class);
    }
}