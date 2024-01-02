<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

    const HOST = "localhost:3306";

    const NAME = "chamados";

    const USER = "root";

    const PASS = "123";

    private $table;

    private $connection;

    public function __construct($table = null){
        $this->table=$table;
        $this->setConnection();
    }

    public function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR".$e->getMessage());
        } 
    }

    public function execute($query, $params=[]){
        try {

            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;

        } catch (PDOException $e) {
            die("ERROR".$e->getMessage());
        }

    }

    public function insert($values){

        //dados da query

        $fields = array_keys($values);
        $binds =  array_pad([], count($fields), '?');

        //monta a query

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',', $binds).')';
        
        
        //executa

        $this->execute($query,array_values($values));

        return $this->connection->lastInsertId();
        
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){

        $where = !empty($where) ? 'WHERE '.$where :'';

        $order = !empty($order) ? 'ORDER BY '.$order :'';

        $limit = !empty($limit) ? 'LIMIT '.$limit :'';

        $query = 'SELECT '.$fields.' FROM '.'ticket'.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);

    }
}
