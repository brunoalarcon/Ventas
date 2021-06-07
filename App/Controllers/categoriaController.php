<?php

namespace App\Controllers;

use App\Daos\CategoriaDAO;
use Libs\Controller;
use stdClass;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->loadDirectoryTemplate('categoria');
        $this->loadDAO('categoria');
    }
    public function Index()
    {
        $data = $this->dao->getAll(true);
        echo $this->template->render('index', ['data' => $data]);
    }

    public function detail($param = null)
    {
        $id= isset($param[0]) ? $param[0] : 0;
        $data = $this->dao->get($id);
        //myEcho($data);
        echo $this->template->render('detail', ['data' => $data]);
    }

    public function save()
    {
        $obj = new stdClass();

        $obj->categoryid = isset($_POST['categoryid']) ? $_POST['categoryid'] :0;
        $obj->categoryid = isset($_POST['categoryname']) ? $_POST['categoryname'] : "";
        $obj->description = isset($_POST['description']) ? $_POST['description'] : "";

        if (isset($_POST['estado'])) {
            if ($_POST['estado'] == 'on') {
                $obj->estado = true;
            } else {
                $obj->estado = false;
            }
        } else {
            $obj->estado = false;
        }

        if ($obj->idcategoria>0) {
            $this->dao->update($obj);
        }else{
            $this->dao->create($obj);
        }

        header('Location:' .  URL . 'categoria/index' );

    }
    
    public function delete()
    {
        
    }

}
