<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

class ReadSheetController extends Controller {

    public function handleRequest($req) { 

        $model = new \nighthawk\hw4\models\ReadSheetModel();
        $view = new \nighthawk\hw4\views\ReadSheetView();
        $newRes = Array();
        $md5_f = "";

        $model->initConnection();
        
        if (isset($_REQUEST['code'])) {
            echo "Analyzing hashcode : ".$_REQUEST['code']." ...";
            $dataFromCode = $model->getDataByCode($_REQUEST['code']);
            $id = $dataFromCode[0];
            $dataFromId = $model->getDataById($id);
            $name = $dataFromId[0];

            $md5_f = substr(md5($name.'file'), 0, 7);

            array_push($newRes, $name);
            array_push($newRes, $dataFromId[1]);
            array_push($newRes, "File");
            array_push($newRes, $md5_f);
        } 

        $view->render($newRes);
    }

}

?>