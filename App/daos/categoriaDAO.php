<?php

namespace App\Daos;

use Libs\Connection;
use Libs\Dao;

class CategoriaDAO extends Dao
{
    public function __construct()
    {
        $this->loadConnection();
    }

    public function getAll()
    {
        $sql = "SELECT idcategoria, nombrecategoria, descripcion FROM Categoria";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function get(int $id)
    {
        $result = null;

        if ($id > 0) {
            $sql = "SELECT idcategoria, nombrecategoria, descripcion FROM Categoria WHERE idcategoria=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_OBJ);
        }
        
        return $result;
    }

}