<?php

namespace App\Daos;

use Libs\Dao;
use stdClass;

class CategoriaDAO extends Dao
{
    public function __construct()
    {
        $this->loadConnection();
    }

    public function getAll(bool $estado)
    {
        $sql = "SELECT categoryid, categoryname, description, estado FROM categories WHERE estado = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $estado, \PDO::PARAM_BOOL);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function get(int $id)
    {     
        if ($id > 0) {
            $sql = "SELECT categoryid, categoryname, description, estado FROM categories WHERE categoryid=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_OBJ);
        }else{
            $result = new stdClass();
            $result->idcategoria=0;
            $result->nombrecategoria='';
            $result->descripcion='';
            $result->estado=false;
        }
        
        return $result;
    }

    public function create($obj)
    {
        $sql = "INSERT INTO categories (categoryname, description, estado) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $obj->nombrecategoria, \PDO::PARAM_STR);
        $stmt->bindParam(2, $obj->descripcion, \PDO::PARAM_STR);
        $stmt->bindParam(3, $obj->estado, \PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    public function update($obj)
    {
        $sql = "UPDATE categories SET categoryname=?, description=?, estado=? WHERE categoryid=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $obj->nombrecategoria, \PDO::PARAM_STR);
        $stmt->bindParam(2, $obj->descripcion, \PDO::PARAM_STR);
        $stmt->bindParam(3, $obj->estado, \PDO::PARAM_BOOL);
        $stmt->bindParam(4, $obj->idcategoria, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM categories WHERE categoryid=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function baja(int $id)
    {
        $sql = "UPDATE categories SET estado='false' WHERE categoryid=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}