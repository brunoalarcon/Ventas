<?php

namespace App\Controllers;


use App\Daos\CategoriaDAO;
use GUMP;
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
        $valid_data = $this->valida($_POST);

        $status = $valid_data['status'];
        $data = $valid_data['data'];

        if ($status==true) {
            $obj = new stdClass();
            $obj->categoryid = isset($_POST['categoryid']) ? $_POST['categoryid'] :0;
            $obj->categoryid = isset($_POST['categoryname']) ? $_POST['categoryname'] : "";
            $obj->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

             if (isset($_POST['estado'])) {
                if ($_POST['estado'] == 'on') {
                    $obj->estado = true;
                } else {
                $obj->estado = false;
            }
            } else {
                $obj->estado = false;
             }

            if ($obj->categoryid>0) {
                $rpta = $this->dao->update($obj);
            }else{
                $rpta = $this->dao->create($obj);
            }

            if ($rpta) {
                $response = [
                    'success' => 1,
                    'message' =>'Categoria guardada correctamente',
                    'redirection' => URL .'categoria/index'
                ];
            }else{
                $response = [
                    'success' => 0,
                    'message' =>'Error al guardar los datos',
                    'redirection' => ' '
                ];
            }
        }else{
            $response = [
                'success' => -1,
                'message' =>$data,
                'redirection' => ''
            ];
        }
        return $response;       
        // header('Location:' .  URL . 'categoria/index' );

    }
    
    public function delete()
    {
        $id = isset($param[0]) ? $param[0] : 0;

        if ($id > 0) {
            $this->dao->delete($id);
        }

        header('Location:' . URL . 'categoria/index');
    }

    public function valida($datos)
    {
        $gump = new GUMP('es');

        $gump->validation_rules([
            'nombre' => 'required|max_len,10',
            'descripcion' => 'min_len,5|max_len,10'
        ]);

        $valid_data = $gump->run($datos);
        if ($gump->errors()) {
            $response = [
                'status' => false,
                'data' => $gump->get_errors_array()
            ];
        }

        return $response;
    }

}
