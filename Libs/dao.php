<?php

namespace Libs;

class Dao
{
    protected $pdo;
    protected $bd;
    
    public function LoadConnection()
    {
        $this->pdo = Connection::getInstance()->getConnection();
    }

    public function loadEloquent()
    {
        $this->bd =new Database();
    }
}
