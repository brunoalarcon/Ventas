<?php

namespace Libs;

class Dao
{
    protected $pdo;
    
    public function LoadConnection()
    {
        $this->pdo = Connection::getInstance()->getConnection();
    }
}
