<?php

namespace Core;
use PDO;
class Database
{
    protected  $connection;
    protected $statement;

    public function __construct($config,$user,$password)
    {
        $dsn = "mysql:".http_build_query($config,'',';  ');

        $this->connection = new \PDO($dsn,$user,$password,[\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC]);

    }

    public function query($query,$param =  []){

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($param);
        return $this;
    }
    public function get(){
        return $this->statement->fetchAll();
    }
    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
        $result = $this->find();
        if (! $result){
            abort(404);
        }
        return $result;
    }
    public function getConnection(){
        return $this->connection;
    }
}