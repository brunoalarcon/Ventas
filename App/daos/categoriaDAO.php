<?php

namespace App\Daos;

use CategoriaModel;
use CategoriaModel as GlobalCategoriaModel;
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
        $result= CategoriaModel::where('Estado', $estado)
        ->orderBy('IdCateg', 'DESC')
        ->get();
        return $result;

        // $sql = "SELECT categoryid, categoryname, descripcion, estado FROM categories WHERE estado = ?";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->bindParam(1, $estado, \PDO::PARAM_BOOL);
        // $stmt->execute();
        // $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        // return $result;
    }

    public function get(int $id)
    {     
        
        $result = CategoriaModel::find($id);
        return $result;

        // if ($id > 0) {
        //     $sql = "SELECT categoryid, categoryname, descripcion, estado FROM categories WHERE categoryid=?";
        //     $stmt = $this->pdo->prepare($sql);
        //     $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        //     $stmt->execute();
        //     $result = $stmt->fetch(\PDO::FETCH_OBJ);
        // }else{
        //     $result = new stdClass();
        //     $result->idcategoria=0;
        //     $result->nombrecategoria='';
        //     $result->descripcion='';
        //     $result->estado=false;
        // }

        $result = CategoriaModel::find($id);
        return $result;
    }

    public function create($obj)
    {
        $model = new CategoriaModel();
        $model->categoryid = $obj->categoryid;
        $model->Nombre = $obj->nombre;
        $model->Descripcion = $obj->descripcion;
        $model->Estado = $obj->estado;
        return $model->save();

        // $sql = "INSERT INTO categories (categoryname, descripcion, estado) VALUES (?,?,?)";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->bindParam(1, $obj->nombrecategoria, \PDO::PARAM_STR);
        // $stmt->bindParam(2, $obj->descripcion, \PDO::PARAM_STR);
        // $stmt->bindParam(3, $obj->estado, \PDO::PARAM_BOOL);
        // return $stmt->execute();
    }

    public function update($obj)
    {
        $model = GlobalCategoriaModel::find($obj->categoryid);
        $model->categoryid = $obj->categoryid;
        $model->Nombre = $obj->nombre;
        $model->Descripcion = $obj->descripcion;
        $model->Estado = $obj->estado;
        return $model->save();

        // $sql = "UPDATE categories SET categoryname=?, descripcion=?, estado=? WHERE categoryid=?";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->bindParam(1, $obj->nombrecategoria, \PDO::PARAM_STR);
        // $stmt->bindParam(2, $obj->descripcion, \PDO::PARAM_STR);
        // $stmt->bindParam(3, $obj->estado, \PDO::PARAM_BOOL);
        // $stmt->bindParam(4, $obj->idcategoria, \PDO::PARAM_INT);
        // return $stmt->execute();
    }

    public function delete(int $id)
    {
        $model = CategoriaModel::find($id);
        return $model->delete();
        // $sql = "DELETE FROM categories WHERE categoryid=?";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        // return $stmt->execute();
    }

    public function baja(int $id)
    {
        $sql = "UPDATE categories SET estado='false' WHERE categoryid=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}