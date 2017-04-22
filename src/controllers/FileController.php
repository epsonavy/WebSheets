<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

class FileController extends Controller {

    public function handleRequest($req) { 

        $model = new \nighthawk\hw4\models\FileModel();
        $view = new \nighthawk\hw4\views\FileView();
        $newRes = Array();
        $model->initConnection();

        if (isset($_POST['code'])) {
            $code = $_POST['code'];
            $model->getDataByCode($code);
        }

        //$view->render($newRes);
    }
}

?>